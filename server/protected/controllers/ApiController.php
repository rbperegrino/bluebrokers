<?php

class ApiController extends Controller
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */
    Const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    // Actions
    public function actionList($id = null)
    {
        // Get the respective model instance
        switch($_GET['model'])
        {
            case 'categoria':
                $models = Categoria::model()->findAll();
                break;
            case 'subcategoria':
                $models = Subcategoria::model()->with('categoria')->findAllByAttributes(array('categoria_id' => $id));
                break;
            case 'anuncios':
                $anuncio = array('subcategoria_id' => $id, 'status' => 1);
                $criteria = new CDbCriteria(array('order'=>'t.destaque DESC, t.criado ASC'));
                $models = Anuncio::model()->with('subcategoria')->findAllByAttributes($anuncio, $criteria);
                break;

            case 'anuncio':
                $models = Anuncio::model()->with('subcategoria')->findByPk($id);
                break;
           

            default:
                // Model not implemented error
                $this->_sendResponse(501, sprintf(
                    'Error: Mode <b>list</b> is not implemented for model <b>%s</b>',
                    $_GET['model']) );
                Yii::app()->end();
        }
        // Did we get some results?
        if(empty($models)) {
            // No
            $this->_sendResponse(200,
                sprintf('No items where found for model <b>%s</b>', $_GET['model']) );
        } else {
            // Prepare response
            if(isset($models->attributes)){
                $rows = $this->trataModel($models);
            }
            else{
                $rows = $this->trataModels($models);
            }

            // Send the response
            $this->_sendResponse(200, CJSON::encode($rows));
        }
    }
    public function actionView()
    {
    }
    public function actionCreate()
    {
    }
    public function actionUpdate()
    {
    }
    public function actionDelete()
    {
    }

     public function actionBusca()
    {
        $anuncio = array('titulo' => $_GET['titulo'], 'status' => 1);
        $criteria = new CDbCriteria(array('order'=>'t.destaque DESC, t.criado ASC'));
        $models = Anuncio::model()->findAllByAttributes($anuncio, $criteria);
        var_dump($models);
        die;
        $rows = $this->trataModels($models);
        $this->_sendResponse(200, CJSON::encode($rows));
    }

    private function _sendResponse($status = 200, $body = '', $content_type = 'text/html')
    {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if($body != '')
        {
            // send the body
            echo $body;
        }
        // we need to create the body if none is passed
        else
        {
            // create some body messages
            $message = '';

            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch($status)
            {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on
            // (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templated in a real-world solution
            $body = '
                        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                        <html>
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                            <title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
                        </head>
                        <body>
                            <h1>' . $this->_getStatusCodeMessage($status) . '</h1>
                            <p>' . $message . '</p>
                            <hr />
                            <address>' . $signature . '</address>
                        </body>
                        </html>';

            echo $body;
        }

        Yii::app()->end();
    }

    private function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }

    private function _checkAuth()
    {
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if(!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(401);
        }
        $username = $_SERVER['HTTP_X_USERNAME'];
        $password = $_SERVER['HTTP_X_PASSWORD'];
        // Find the user
        $user=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        if($user===null) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Name is invalid');
        } else if(!$user->validatePassword($password)) {
            // Error: Unauthorized
            $this->_sendResponse(401, 'Error: User Password is invalid');
        }
    }

    private function trataModels($models){
        $rows = array();
        $index = 0;
        foreach($models as $model){
            $rows[] = $model->attributes;
            if(isset($model->categoria_id))
                $rows[$index]['categoria'] = $model->categoria->nome;

            if(isset($model->subcategoria_id)){

                $rows[$index]['categoria'] = $model->subcategoria->categoria->nome;
                $rows[$index]['subcategoria'] = $model->subcategoria->nome;
                $rows[$index]['valor'] = 'R$ ' . $rows[$index]['valor'];

                if($rows[$index]['destaque'])
                    $rows[$index]['destaque'] == 'true';
                else
                    unset($rows[$index]['destaque']);

                unset($rows[$index]['ano']);
                unset($rows[$index]['descricao']);
                unset($rows[$index]['email']);
                unset($rows[$index]['telefone']);
                unset($rows[$index]['atributo_1']);
                unset($rows[$index]['atributo_2']);
                unset($rows[$index]['atributo_3']);
                unset($rows[$index]['status']);
                unset($rows[$index]['subcategoria_id']);
                unset($rows[$index]['criado']);
                unset($rows[$index]['criado_por']);
                unset($rows[$index]['modificado']);
                unset($rows[$index]['modificado_por']);


            }


            $index++;
        }

        return $rows;
    }

    private function trataModel($model){



        return $model->attributes;
    }

}