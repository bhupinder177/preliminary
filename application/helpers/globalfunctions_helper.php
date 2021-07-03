<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
/* This function checks the Type of User */



function getrow($table,$whr)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($whr);
   $output = $ci->db->get();
   $output = $output->row();
   return $output;
 }

function getrowone($table,$whr)
 {
   $ci = & get_instance();
   $ci->db->select('*');
   $ci->db->from($table);
   $ci->db->where($whr);
   $output = $ci->db->get();
   $output = $output->row();
   return $output;
 }

 function getone($table)
  {
    $ci = & get_instance();
    $ci->db->select('*');
    $ci->db->from($table);
    $output = $ci->db->get();
    $output = $output->row();
    return $output;
  }

 function get($table,$whr)
  {
    $ci = & get_instance();
    $ci->db->select('*');
    $ci->db->from($table);
    $ci->db->where($whr);
    $output = $ci->db->get();
    $output = $output->result();
    return $output;
  }

  function getcategory($table,$whr)
   {
     $ci = & get_instance();
     $ci->db->select('*');
     $ci->db->from($table);
     $ci->db->where($whr);
     $ci->db->limit('3');
     $output = $ci->db->get();
     $output = $output->result();
     return $output;
   }

   function getanothercategory($ids)
   {
     $ci = & get_instance();
     $ci->db->select('*');
     $ci->db->from('categories');
     $ci->db->where('categoriesStatus',1);
     $ci->db->where('categoriesParent',0);
     $ci->db->where_not_in('categoriesId',$ids);
     $ci->db->limit('3');
     $output = $ci->db->get();
     $output = $output->result();
     return $output;
   }

   function getsubcatory()
   {
     $ci = & get_instance();
     $ci->db->select('*');
     $ci->db->from('categories');
     $ci->db->where('categoriesStatus',1);
     $ci->db->where_not_in('categoriesParent',0);
     $ci->db->limit('3');
     $output = $ci->db->get();
     $output = $output->result();
     return $output;
   }

  function getTable($table)
   {
     $ci = & get_instance();
     $ci->db->select('*');
     $ci->db->from($table);
     $output = $ci->db->get();
     $output = $output->result();
     return $output;
   }

  function getProfitSum($table,$where)
   {
     $ci = & get_instance();
     $ci->db->select('sum(profit) as total');
     $ci->db->from($table);
     $ci->db->where($where);
     $output = $ci->db->get();
     $output = $output->row();
     return $output;
   }

 function getPaginationlink($perPage,$totalItem = 0,$url,$uri, $numbr) {

     $ci = & get_instance();

     $config['base_url'] = $url;
     $config['total_rows'] = $totalItem;
     $config['per_page'] = $perPage;
     $config["uri_segment"] = $uri;
     $config["page_query_string"] = false;


     $config["num_links"] = 2;
     $config["use_page_numbers"] = TRUE;
     $config['full_tag_open'] = '<ul class="pagination " id="ajax_pagingsearc' . $numbr . '">';
     $config['full_tag_close'] = '</ul>';
     $config['first_link'] = false;
     $config['last_link'] = false;
     $config['first_tag_open'] = '<li>';
     $config['first_tag_close'] = '</li>';
     $config['prev_link'] = '&laquo';
     $config['prev_tag_open'] = '<li class="prev">';
     $config['prev_tag_close'] = '</li>';
     $config['next_link'] = '&raquo';
     $config['next_tag_open'] = '<li>';
     $config['next_tag_close'] = '</li>';
     $config['last_tag_open'] = '<li>';
     $config['last_tag_close'] = '</li>';
     $config['cur_tag_open'] = '<li class="active"><a  href="#">';
     $config['cur_tag_close'] = '</a></li>';
     $config['num_tag_open'] = '<li>';
     $config['num_tag_close'] = '</li>';

     $ci->pagination->initialize($config);
     return $ci->pagination->create_links();
 }



?>
