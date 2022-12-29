<?php

class Purchase extends My_Controller
{
    public function index()
    {
        $vendor = $this->My_model->get_all($table_name = 'vendor', $limit = '', $start = '0', $order_by = 'vendor_id', $order_type = 'desc');
        if ($vendor) {
            $data['vendor'] = $vendor->result();
        } else {
            $data['vendor'] = false;
        }

        $this->render("purchase/purchase_index_v", $data);
    }

    public function all_purchase()
    {
        $purchase = $this->My_model->get_all($table_name = 'purchase', $limit = '', $start = '0', $order_by = 'purchase_id', $order_type = 'desc');
        if ($purchase) {
            $data['purchase'] = $purchase->result();
        } else {
            $data['purchase'] = false;
        }

        $purchase_dom = $this->load->view('pages/purchase/all_purchase_v', $data, true);
        $this->send_data(1, 'ok', $purchase_dom);
    }

    public function add_new_purchase()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $this->form_validation->set_rules('item_name', 'Item name', 'trim|required|max_length[1024]|strip_tags');
            $this->form_validation->set_rules('item_quantity', 'Item quantity', 'trim|required|max_length[500]|strip_tags');
            $this->form_validation->set_rules('unit_price', 'Unit price', 'trim|required|max_length[500]|strip_tags');
            $this->form_validation->set_rules('vendor_name', 'Vendor name', 'trim|required|max_length[1024]|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                $this->send_data(0, validation_errors());
            } else {
                $total_price = ($this->input->post('item_quantity') * $this->input->post('unit_price'));

                $post_data = array(
                    'item_name' => $this->input->post('item_name'),
                    'item_quantity' => $this->input->post('item_quantity'),
                    'unit_price' => $this->input->post('unit_price'),
                    'total_price' => $total_price,
                    'vendor_name' => $this->input->post('vendor_name'),
                );

                $this->My_model->insert($table_name = 'purchase', $post_data);
                $this->send_data(1, "New purchase added successfully");
            }
        }
    }
}
