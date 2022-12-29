<?php

class Home extends My_Controller
{
    public function index()
    {

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $this->form_validation->set_rules('vendor_name', 'Vendor name', 'trim|required|max_length[1024]|strip_tags');
            $this->form_validation->set_rules('phone_number', 'Phone number', 'trim|required|max_length[30]|strip_tags');
            $this->form_validation->set_rules('email_address', 'Email address', 'trim|required|max_length[500]|strip_tags');
            $this->form_validation->set_rules('office_address', 'Office address', 'trim|required|max_length[500]|strip_tags');
            
            if ($this->form_validation->run() == FALSE) {
                $this->render('home/index_v');
            } else {
                
            }
        }

        $this->render('home/index_v');
    }
}
