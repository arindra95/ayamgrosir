<?php  
  defined('BASEPATH') OR exit('No direct script access allowed');

  class mpengguna extends CI_Model{


      function __construct(){
        parent::__construct();
        $this->load->database();
        
      }

      function _get_datatables_query(){

        $this->db->from($this->table);
        
        $i = 0;

        foreach ($this->column_search as $item) 
        {
          if($_POST['search']['value'])
          {

            if ($i===0) 
            {
            
                $this->db->group_start();
                $this->db->like($item, $_POST['search']['value']);

            }else{
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 === $i)
                $this->db->group_end();
          }
          $i++;
        }

        if (isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }
        elseif (isset($this->order)) 
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);

        }

      }

      function get_datatables(){
          $this->_get_datatables_query();
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'],$_POST['start']);
          $query = $this->db->get();
          return $query->result();
      
      }

      function count_filtered()
      {
          $this->_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
      }

      function count_all(){
          $this->db->from($this->table);      
          return $this->db->count_all_results();
      }

      function get_id($id){
          $this->db->from($this->table);
          $this->db->where('id', $id);
          $query=$this->db->get();

          return $query->row();
      }

      public function get_data(){
          return $this->db->get('user');
      }

      public function get_total_user()
      {
          $query = $this->db->select("COUNT(*) as num")->get("user");
          $result = $query->row();
          if(isset($result)) return $result->num;
          return 0;
      }

       public function get_by_id($id)
    {
        $this->db->from('supplier');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }

      function save($data){
          $this->db->set($data);
          $this->db->insert('user');
          return $this->db->insert_id();
      }

      function update($where,$data){
          $this->db->where($where);
          $this->db->update('user', $data);
        
      }

      function delete($id){
          $this->db->where('id', $id);
          $this->db->delete('user');
      }

      
  }
?>