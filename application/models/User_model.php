<?php
class User_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    public function get_setting($id = 1)
    {
        if ($id === 0)
        {
            $query = $this->db->get('setting');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('setting', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_activity()
    {
        $query = $this->db->get('logins');
        return $query->result_array();
    }
    
    public function get_user_login($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => md5($password)));        
        //return $query->num_rows();
        return $query->row_array();
    }
    
    public function set_user($id = 0)
    {
        $image = $this->upload_image();
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'image' => $image,
            'updated_at' => date('Y-m-d H:i:s')
        );
            
        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }
    public function set_setting($id = 1)
    {
        $image = $this->upload_logo();
        $data = array(
            'name' => $this->input->post('name'),
            'logo' => $image
        );
            
        if ($id == 0) {
            return $this->db->insert('setting', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('setting', $data);
        }
    }
    
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }    
    public function upload_logo()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('Upload', $config);
        if ( ! $this->upload->do_upload('logo'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['logo']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }
    public function upload_image()
    {
    	// assets/images/product_image
        $config['upload_path'] = 'assets/images';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';

        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('Upload', $config);
        if ( ! $this->upload->do_upload('profile_img'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['profile_img']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['upload_path'].'/'.$config['file_name'].'.'.$type;
            return ($data == true) ? $path : false;            
        }
    }
}
