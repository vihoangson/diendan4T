<?php

/**
 * Class MY_Controller
 *
 * @property Diendan_model $Diendan_model
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Table $table
 * @property CI_Session $session
 * @property CI_FTP $ftp
 * @property Breadcrumbs $breadcrumbs
 * * @property Forum_model $Forum_model
 * * @property Thread_model $Thread_model
 * * @property Post_model $Post_model
 *
 * ....

 */
class MY_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->breadcrumbs->push('Trang chủ', '/');
    }
}