<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common extends CI_Model {

    public function __construct()
   {
        parent::__construct();
    }






    public function getIn($tbl,$field,$ids)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where_in($field,$ids);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getRecentOne($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->limit(1);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getByOrder($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getOneRow($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->limit(1);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getone($tbl)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->limit(1);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }



     public function getorder($userid)
     {
       $this->db->select('*');
       $this->db->from('chdmart_order');
       $this->db->where_in('orderId',"SELECT orderId FROM chdmart_orderitem where storeuserId='$userid'", FALSE);
       $result = $this->db->get();
       $result = $result->result();
        // $result = $this->db->last_query();
       return $result;
     }



  	public function update($where,$data,$table)
  	{
  		$this->db->where($where);
  		$this->db->update($table,$data);
  		$db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			$output = array (1);
  		else
  			$output = array (0);
  			return $output;
  	}

    public  function autocomplete($field,$keyword,$tbl)
     {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->like($field,$keyword,'both');
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result();
   }


    public function delete($table,$where)
  	{
  		$this->db->where($where);
  		$this->db->delete($table);
  		$db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			return '1';
  		else
  			return '0';
  	}

    public function deleteMultiple($table,$where,$values)
    {
      $this->db->where_in($where, $values);
      $this->db->delete($table);
      $db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			return '1';
  		else
  			return '0';
    }

  	public function insert($table,$data)
  	{
  		$this->db->insert($table,$data);
  		$insert_id = $this->db->insert_id();
  		if( $insert_id != 0)
  			$output = array (1,$insert_id);
  		else
  			$output = array (0);
  		return $output;
  	}

  	public function insert_batch($table,$data)
  	{
  		$this->db->insert_batch($table,$data);
  		$insert_id = $this->db->insert_id();
  		if( $insert_id != 0)
  			$output = array (1,$insert_id);
  		else
  			$output = array (0);
  		return $output;
  	}

  	public function checkexist($table,$where)
  	{
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $output = $this->db->get();
        $output = $output->num_rows();
		    return $output;
  	}

  public function getbylimit($tbl,$whr,$limit)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($limit);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getTablebylimit($tbl,$whr,$limit)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($limit);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getbylimitStart($tbl,$whr,$start,$perPage)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }


public function getbypagination($tbl,$orderby,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  // $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by($orderby,'desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getbypaginationPolicy($tbl,$orderby,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  // $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by($orderby,'asc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}


public function getbypaginationslider($tbl,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  // $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

    public function getTableFields($value ='')
    {
      $fields = $this->db->list_fields($value);
      return $fields;
    }

  public function get($tbl,$whr)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}




  public function get_groupby($tbl,$whr,$group_by)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->group_by($group_by);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}


  public function getSorted($tbl,$whr,$field,$sort)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->order_by($field, $sort);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}




  public function getRecent($tbl,$whr,$id,$howmany)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->order_by($id, "desc");
    $this->db->limit($howmany);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }




	public function getrow($tbl,$whr)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
	}



  public function count_all_results($tbl,$whr)
  {
    $this->db->where($whr);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_like($tbl,$field,$keyword)
  {
    $this->db->like($field,$keyword,'both');
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }


  public function count_all_table($tbl)
  {
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_LatestNotification($tbl,$whr,$lastId)
  {
    $this->db->where($whr);
    $this->db->where('notificationId > ',$lastId);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getTable($tbl)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function getFields($tbl,$whr,$fields)
	{
		$this->db->select(implode(',',$fields));
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}


  public function getbypaginationWhere($tbl,$whr,$orderby,$start,$perPage)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by($orderby,'desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }




 public function count_searchcategories($search)
 {
   $this->db->where('categoriesParent',0);
   $this->db->like('categoriesName',$search,'both');
   $this->db->from('categories');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function searchcategories($search,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from('categories');
   $this->db->where('categoriesParent',0);
   $this->db->like('categoriesName',$search,'both');
   $this->db->limit($perPage,$start);
   $this->db->order_by('categoriesId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getsubactegory()
 {
   $this->db->select('*');
   $this->db->from('categories');
   $this->db->where_not_in('categoriesParent',0);
   $this->db->where('categoriesStatus',1);
   $this->db->order_by('categoriesId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_searchProduct($search)
 {
   $this->db->like('productTitle',$search,'both');
   $this->db->from('product');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function searchproduct($search,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from('product');
   $this->db->like('productTitle',$search,'both');
   $this->db->limit($perPage,$start);
   $this->db->order_by('productId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_searchvariation($search)
 {
   $this->db->like('variationName',$search,'both');
   $this->db->from('variation');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function searchvariation($search,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from('variation');
   $this->db->like('variationName',$search,'both');
   $this->db->limit($perPage,$start);
   $this->db->order_by('variationId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getchild($id)
   {
   $query = $this->db->query("select categoriesId, categoriesParent from (select * from categories order by categoriesParent,categoriesId) categories, (select @pv := $id) initialisation where find_in_set(categoriesParent, @pv) > 0 and @pv := concat(@pv, ',', categoriesId) ");
   $result = $query->result();
   return $result;
   }

   public function getproductsIn($field,$whr,$start,$perPage)
   {
     $this->db->select("");
     $this->db->from('product as prd');
     $this->db->join('chdmart_categories as cat','prd.categoriesId = cat.id' );
     $this->db->where_in($field,$whr);
     $this->db->limit($perPage,$start);
     $result = $this->db->get();
     $result = $result->result();

     return $result;
   }

   public function getfrontproduct($whr,$start,$perPage)
   {
     $this->db->select("*");
     $this->db->from('product as p');
     $this->db->where($whr);
     $this->db->limit($perPage,$start);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getproductVariation($whr)
   {
     $this->db->select("v.variationName,p.*");
     $this->db->from('productVariation as p');
     $this->db->join('variation as v','v.variationId = p.variationId');
     $this->db->where($whr);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getcolor($whr)
   {
     $this->db->select("v.variationValue,v.variationValueId,p.variationId1,p.price,p.image,p.productId");
     $this->db->from('productVariation as p');
     $this->db->join('variationValues as v','v.variationValueId = p.variationId1');
     $this->db->where($whr);
     $this->db->group_by('p.variationId1');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getsize($whr)
   {
     $this->db->select("v.variationValue,v.variationValueId");
     $this->db->from('productVariation as p');
     $this->db->join('variationValues as v','v.variationValueId = p.variationId2');
     $this->db->where($whr);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }


   	public function getrownext($tbl,$id)
   	{
   		$this->db->select('*');
       $this->db->from($tbl);
       $this->db->where('productId >', $id);
       $result = $this->db->get();
       $result = $result->row();
       return $result;
   	}

    public function getrowpr($tbl,$id)
   	{
   		$this->db->select('*');
       $this->db->from($tbl);
       $this->db->where('productId<',$id);
       $result = $this->db->get();
       $result = $result->row();
       return $result;
   	}

    public function getemail($whr)
    {
      $this->db->select("e.email");
      $this->db->from('variation as v');
      $this->db->join('email as e','e.type = v.variationId');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function allcustomer($start,$perPage)
    {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->limit($perPage,$start);
      $this->db->order_by('userId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }




}
?>
