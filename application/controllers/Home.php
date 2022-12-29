<?php

class Home extends My_Controller
{
    public function index()
    {
        $this->render('home/index_v');
    }

    public function add_new_vendor()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $this->form_validation->set_rules('vendor_name', 'Vendor name', 'trim|required|max_length[1024]|strip_tags');
            $this->form_validation->set_rules('phone_number', 'Phone number', 'trim|required|max_length[30]|strip_tags');
            $this->form_validation->set_rules('email_address', 'Email address', 'trim|required|max_length[500]|strip_tags');
            $this->form_validation->set_rules('office_address', 'Office address', 'trim|required|max_length[500]|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                $this->send_data(0, validation_errors());
            } else {
                $post_data = array(
                    'vendor_name' => $this->input->post('vendor_name'),
                    'phone_number' => $this->input->post('phone_number'),
                    'email_address' => $this->input->post('email_address'),
                    'office_address' => $this->input->post('office_address')
                );

                $this->My_model->insert($table_name = 'vendor', $post_data);
                $this->send_data(1, "New vendor added successfully");
            }
        }
    }

    public function all_vendor()
    {
        $vendor = $this->My_model->get_all($table_name = 'vendor', $limit = '', $start = '0', $order_by = 'vendor_id', $order_type = 'desc');
        if ($vendor) {
            $data['vendor'] = $vendor->result();
        } else {
            $data['vendor'] = false;
        }

        $vendor_dom = $this->load->view('pages/vendor/all_vendor_v', $data, true);
        $this->send_data(1, 'ok', $vendor_dom);
    }

    public function display_vendor_details($vendor_id = '')
    {
        $vendor = $this->My_model->get_by($table_name = 'vendor', $options = array('vendor_id' => $vendor_id));
        if ($vendor) {
            $data['vendor'] = $vendor->row();
        } else {
            $data['vendor'] = false;
        }

        $this->render('vendor/display_vendor_details_v', $data);
    }

    public function update_vendor_details($vendor_id = '')
    {
        $vendor = $this->My_model->get_by($table_name = 'vendor', $options = array('vendor_id' => $vendor_id));
        if ($vendor) {
            $data['vendor'] = $vendor->row();
        } else {
            $data['vendor'] = false;
        }

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $this->form_validation->set_rules('vendor_name', 'Vendor name', 'trim|required|max_length[1024]|strip_tags');
            $this->form_validation->set_rules('phone_number', 'Phone number', 'trim|required|max_length[30]|strip_tags');
            $this->form_validation->set_rules('email_address', 'Email address', 'trim|required|max_length[500]|strip_tags');
            $this->form_validation->set_rules('office_address', 'Office address', 'trim|required|max_length[500]|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                $this->render('vendor/update_vendor_details_v', $data);
            } else {
                $post_data = array(
                    'vendor_name' => $this->input->post('vendor_name'),
                    'phone_number' => $this->input->post('phone_number'),
                    'email_address' => $this->input->post('email_address'),
                    'office_address' => $this->input->post('office_address')
                );

                $this->My_model->update($table_name='vendor', $post_data, $options = array('vendor_id'=>$vendor_id));

                $this->render('vendor/update_vendor_success_v');
            }
        } else {
            $this->render('vendor/update_vendor_details_v', $data);
        }
    }

    
}
