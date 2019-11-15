<?php
class Note_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count()
    {
        return $this->db->count_all('note');
    }
    public function record_count_category()
    {
        return $this->db->count_all('note_category');
    }
    
    public function get_note($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get_where('note', array('user_id' => $this->session->userdata('user_id')));
            return $query->result_array(); // $query->result(); // returns object
        }
 
        $query = $this->db->get_where('note', array('id' => $slug, 'user_id' => $this->session->userdata('user_id')));
        return $query->row_array(); // $query->row(); // returns object
        
        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
    }
    public function get_category($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('note_category');
            return $query->result_array(); // $query->result(); // returns object
        }
 
        $query = $this->db->get_where('note_category', array('id' => $id));
        return $query->row_array(); // $query->row(); // returns object
    }

    public function fetch_category($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("note_category");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    public function fetch_note($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("note");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
        
    public function get_note_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('note');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('note', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_note($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'title' => $this->input->post('title'), // $this->db->escape($this->input->post('title'))
            'text' => $this->input->post('text'),
            'user_id' => $this->input->post('user_id'),
        );

        
        
        if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
            $data['category_id'] =  $this->input->post('category_id');

            return $this->db->insert('note', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('note', $data);
        }
    }
    public function set_category($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
 
        $data = array(
            'name' => $this->input->post('title'), // $this->db->escape($this->input->post('title'))
            'discription' => $this->input->post('text'),
        );
        
        if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
            return $this->db->insert('note_category', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('note_category', $data);
        }
    }
    
    public function delete_note($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('note');

    }
    public function delete_category($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('note_category');

    }
}
