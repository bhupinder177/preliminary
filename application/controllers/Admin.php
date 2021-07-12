<?php
//session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct() {
    parent::__construct();


    $this->load->model('common');
    $this->load->library("pagination");
    $this->load->library('email');
    $this->load->library('session');
    $this->load->library('upload');
    $this->load->helper(array('form', 'url'));

  }


  public function index()
  {
    if(!empty($_POST))
    {
      $data = array(
        'email' =>$_POST['email'],
        'password' => md5($_POST['password']),
      );
      $result = $this->common->getrow('admin',$data);

      if ($result == TRUE)
      {

        $session_data = array(
          'id' => $result->id,
          'email' => $result->email,
          'name' =>$result->name,
          'roleId' =>$result->roleId,
        );

        $this->session->set_userdata('adminloggedin', $session_data);


        $output['url'] = base_url().'admin/dashboard';

        $output['success'] ="true";
        $output['success_message'] ="Login Successfully";
        $output['delayTime'] ='3000';

      }
      else
      {
        $output['formErrors'] = "true";
        $output['errors'] = 'Invalid Username or Password.';
      }

      echo json_encode($output);
      exit;
    }
    else
    {

      $this->load->view('admin/login');

    }
  }

  public function securite()
  {
    if(!isset($this->session->userdata['adminloggedin']['id']))
    {
      redirect('admin');
    }
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect('admin');
  }

  public function dashboard()
  {
    $this->securite();
    $data['customer'] = $this->common->count_all_results("users",array("type"=>1));
    $data['staff'] = $this->common->count_all_results("users",array("type"=>2));

    $this->load->view('admin/header');
    $this->load->view('admin/dashboard',$data);
    $this->load->view('admin/footer');

  }



  public function password()
  {
    $this->securite();
    $this->load->view('admin/header');
    $this->load->view('admin/password');
    $this->load->view('admin/footer');

  }

  public function passwordUpdate()
  {
    $insert = $this->common->update(array("id"=>$this->session->userdata['adminloggedin']['id']),array("password"=>md5($_POST['password'])),'admin');
    if($insert)
    {
      $output['success'] ="true";
      $output['success_message'] ="Password Changed Successfully";
      $output['delayTime'] ='3000';
      $output['resetform'] ='true';
    }
    else
    {
      $output['formErrors'] ="true";
      $output['errors'] ="Password Is Not Change";
    }

    echo json_encode($output);
    exit;
  }


 // variations
 public function variation()
 {
   $data['pcount'] = $this->common->count_all_table('variation');
   $config = array();
   $config["base_url"] = base_url() . 'admin/variationlist/';
   $config["total_rows"] = $this->common->count_all_table("variation");
   $config["per_page"] = 10;
   $config["uri_segment"] = 3;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   if( $page <= 0 )
   {
     $page = 1;
   }
   $start = ($page-1) * $config["per_page"];
   $data['start'] = $start;
   $data['result'] = $this->common->getbypagination('variation','variationId',$start,$config["per_page"]);
   $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);


   $this->load->view('admin/header');
   $this->load->view('admin/article',$data);
   $this->load->view('admin/footer');

 }

 public function variationDelete()
 {
   $query = $this->common->delete('variation',array("variationId"=>$_POST['id']));
   if($query)
   {
     $msg['success']="true";
     $msg['success_message'] ="Article Deleted Successfully";
   }
   else
   {
     $msg['errors'] ="false";
     $msg['errors'] ="Article  is Not Delete";

   }
   echo json_encode($msg);
   exit;
 }

 public function getvariationperpage()
 {
   if(!empty($_POST['perpage']))
  {
   $perpage =$_POST['perpage'];
  }
 else
 {
   $perpage =10;
 }
 if(!empty($_POST['date']))
 {
  $_POST['date'] = date("Y-m-d", strtotime($_POST['date']));
 }

 $config = array();
 if(!empty($_POST['searchtext']))
 {
   $data['pcount'] = $this->common->count_searchvariation($_POST['searchtext']);
   $config["total_rows"] = $this->common->count_searchvariation($_POST['searchtext']);
 }
 else
 {
 $data['pcount'] = $this->common->count_all_table("variation");
 $config["total_rows"] = $this->common->count_all_table("variation");
 }

 $config["base_url"] = base_url() . 'admin/getvariationperpage/';
 $config["per_page"] = $perpage;
 $config["uri_segment"] = 3;
 $this->pagination->initialize($config);
 $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 if( $page <= 0 )
 {
   $page = 1;
 }
 $start = ($page-1) * $config["per_page"];
 $data['start'] = $start;
 if(!empty($_POST['searchtext']))
 {
 $data['result'] = $this->common->searchvariation($_POST['searchtext'],$start,$config["per_page"]);
 }
 else
 {
   $data['result'] = $this->common->getbypagination('variation','variationId',$start,$config["per_page"]);
 }
 $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);
 $data['start'] = $start;
 if($data)
 {
   $output['success'] = "true";
   $output['result'] = $data;
 }
 echo json_encode($output);
 exit;
 }

 public function variation_add()
 {
   $this->securite();
   $this->load->view('admin/header');
   $this->load->view('admin/addarticle');
   $this->load->view('admin/footer');
 }

 public function variationSave()
 {
     $check = $this->common->getrow('variation',array("variationName"=>$_POST['variationName']));
     if(!empty($check))
     {
       $output['formErrors'] ="true";
       $output['errors'] ="Article  is Already Exist.";
     }
     else
     {

     $insert = $this->common->insert('variation',$_POST);

     if($insert)
     {
       $output['success'] ="true";
       $output['success_message'] ="Article  Added Successfully";
       $output['url'] = base_url().'admin/articlelist';
       $output['delayTime'] ='3000';
       $output['resetform'] ='true';
     }
     else
     {
       $output['formErrors'] ="true";
       $output['errors'] ="Article  is Not Added";
     }
   }
     echo json_encode($output);
     exit;
 }


 public function variation_edit($id)
 {
   $this->securite();
   $data['result'] = $this->common->getrow('variation',array("variationId"=>$id));
   $this->load->view('admin/header');
   $this->load->view('admin/editarticle',$data);
   $this->load->view('admin/footer');
 }

 public function variationUpdate($id)
 {

   $update = $this->common->update(array("variationId"=>$id),$_POST,'variation');

   if($update)
   {
     $output['success'] ="true";
     $output['success_message'] ="Article Updated Successfully";
     $output['url'] = base_url().'admin/articlelist';
     $output['delayTime'] ='3000';
   }
   else
   {
     $output['formErrors'] ="true";
     $output['errors'] ="Article Is Not Updated";
   }
   echo json_encode($output);
   exit;


 }

 public function variationStatus()
 {
   $postdata = $_POST;

   $update = $this->common->update(array("variationId"=>$_POST['id']),array("variationStatus"=>$_POST['status']),'variation');
   if($update)
   {
     $output['success'] ="true";
     $output['success_message'] ="Status Changed Successfully";
   }
   else
   {
     $output['formErrors'] ="true";
     $output['errors'] ="Status Is Not Changed";
   }
   echo json_encode($output);
   exit;
 }


 ////customer
   public function customer()
   {
     $this->securite();
     $data['pcount'] = $this->common->count_all_results("users",array("type"=>1));
     $config = array();
     $config["base_url"] = base_url() . 'admin/customerlist/';
     $config["total_rows"] = $this->common->count_all_results("users",array("type"=>1));
     $config["per_page"] = 10;
     $config["uri_segment"] = 3;
     $this->pagination->initialize($config);
     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     if( $page <= 0 )
     {
       $page = 1;
     }
     $start = ($page-1) * $config["per_page"];
     $data['start'] = $start;
     $data['result'] = $this->common->allcustomer($start,$config["per_page"]);
     $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);


     $this->load->view('admin/header');
     $this->load->view('admin/customer',$data);
     $this->load->view('admin/footer');

   }

   public function customer_add()
   {
     $this->securite();
     $data['articles'] = $this->common->get('variation',array("variationStatus"=>1));

     $this->load->view('admin/header');
     $this->load->view('admin/addcustomer',$data);
     $this->load->view('admin/footer');
   }

   public function customerSave()
   {
       $article = $_POST['checked'];
       unset($_POST['checked']);
       $check = $this->common->getrow('users',array("email"=>$_POST['email']));
       if(!empty($check))
       {
         $output['formErrors'] ="true";
         $output['errors'] ="Email  is Already Exist.";
       }
       else
       {

       $insert = $this->common->insert('users',$_POST);

       if($insert)
       {
         if(!empty($article))
         {
           foreach($article as $key=>$a)
           {
             $b['userId'] = $insert[1];
             $b['variationId'] = $key;

             $this->common->insert('user_articles',$b);
           }
         }
       }
       if($insert)
       {
         $output['success'] ="true";
         $output['success_message'] ="Customer  Added Successfully";
         $output['url'] = base_url().'admin/customerlist';
         $output['delayTime'] ='3000';
         $output['resetform'] ='true';
       }
       else
       {
         $output['formErrors'] ="true";
         $output['errors'] ="Customer  is Not Added";
       }
     }

       echo json_encode($output);
       exit;
   }

   public function customerDelete()
   {
     $query = $this->common->delete('users',array("userId"=>$_POST['id']));
     if($query)
     {
       $msg['success']="true";
       $msg['success_message'] ="Customer Deleted Successfully";
     }
     else
     {
       $msg['errors'] ="false";
       $msg['errors'] ="Customer  is Not Delete";
     }
     echo json_encode($msg);
     exit;
   }



   public function customer_edit($id)
   {
     $this->securite();
     $data['articles'] = $this->common->get('variation',array("variationStatus"=>1));
     $selectedId = array();
     $selected = $this->common->get('user_articles',array("userId"=>$id));
     if(!empty($selected))
     {
       foreach($selected as $s)
       {
         $selectedId[]=$s->variationId;
       }
     }
     $data['selectedId'] = $selectedId;
     $data['result'] = $this->common->getrow('users',array("userId"=>$id));
     $this->load->view('admin/header');
     $this->load->view('admin/editcustomer',$data);
     $this->load->view('admin/footer');
   }

   public function customerUpdate($id)
   {
     $article = $_POST['checked'];
       unset($_POST['checked']);

     $update = $this->common->update(array("userId"=>$id),$_POST,'users');
     if($update)
     {
       $this->common->delete('user_articles',array("userId"=>$id));
       if(!empty($article))
       {
         foreach($article as $key=>$a)
         {
           $b['userId'] = $id;
           $b['variationId'] = $key;

           $this->common->insert('user_articles',$b);
         }
       }
     }

     if($update)
     {
       $output['success'] ="true";
       $output['success_message'] ="Customer Updated Successfully";
       $output['url'] = base_url().'admin/customerlist';
       $output['delayTime'] ='3000';
     }
     else
     {
       $output['formErrors'] ="true";
       $output['errors'] ="Customer Is Not Updated";
     }
     echo json_encode($output);
     exit;
   }


   public function getcustomerperpage()
   {
     if(!empty($_POST['perpage']))
   {
     $perpage =$_POST['perpage'];
   }
   else
   {
     $perpage =10;
   }
   if(!empty($_POST['date']))
   {
    $_POST['date'] = date("Y-m-d", strtotime($_POST['date']));
   }

   $config = array();

   $data['pcount'] = $this->common->count_all_results("users",array("type"=>1));
   $config["total_rows"] = $this->common->count_all_results("users",array("type"=>1));


   $config["base_url"] = base_url() . 'admin/getcustomerperpage/';
   $config["per_page"] = $perpage;
   $config["uri_segment"] = 3;
   $this->pagination->initialize($config);
   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   if( $page <= 0 )
   {
     $page = 1;
   }
   $start = ($page-1) * $config["per_page"];
   $data['start'] = $start;

     $data['result'] = $this->common->allcustomer($start,$config["per_page"]);

   $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);
   $data['start'] = $start;
   if($data)
   {
     $output['success'] = "true";
     $output['result'] = $data;
   }
   echo json_encode($output);
   exit;
   }

   // customer section

   ////Staff
     public function staff()
     {
       $this->securite();
       $data['pcount'] = $this->common->count_all_results("users",array("type"=>2));
       $config = array();
       $config["base_url"] = base_url() . 'admin/stafflist/';
       $config["total_rows"] = $this->common->count_all_results("users",array("type"=>2));
       $config["per_page"] = 10;
       $config["uri_segment"] = 3;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       if( $page <= 0 )
       {
         $page = 1;
       }
       $start = ($page-1) * $config["per_page"];
       $data['start'] = $start;
       $data['result'] = $this->common->allstaff($start,$config["per_page"]);
       $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);


       $this->load->view('admin/header');
       $this->load->view('admin/staff',$data);
       $this->load->view('admin/footer');

     }

     public function staff_add()
     {
       $this->securite();
       $this->load->view('admin/header');
       $this->load->view('admin/addstaff');
       $this->load->view('admin/footer');
     }

     public function staffSave()
     {
       $check = $this->common->getrow('users',array("email"=>$_POST['email']));
       if(!empty($check))
       {
         $output['formErrors'] ="true";
         $output['errors'] ="Email  is Already Exist.";
       }
       else
       {
         $insert = $this->common->insert('users',$_POST);
         if($insert)
         {
           $output['success'] ="true";
           $output['success_message'] ="Staff  Added Successfully";
           $output['url'] = base_url().'admin/stafflist';
           $output['delayTime'] ='3000';
           $output['resetform'] ='true';
         }
         else
         {
           $output['formErrors'] ="true";
           $output['errors'] ="Staff  is Not Added";
         }
       }

         echo json_encode($output);
         exit;
     }

     public function staffDelete()
     {
       $query = $this->common->delete('users',array("userId"=>$_POST['id']));
       if($query)
       {
         $msg['success']="true";
         $msg['success_message'] ="Staff Deleted Successfully";
       }
       else
       {
         $msg['errors'] ="false";
         $msg['errors'] ="Staff  is Not Delete";
       }
       echo json_encode($msg);
       exit;
     }



     public function staff_edit($id)
     {
       $this->securite();
       $data['result'] = $this->common->getrow('users',array("userId"=>$id));
       $this->load->view('admin/header');
       $this->load->view('admin/editstaff',$data);
       $this->load->view('admin/footer');
     }

     public function staffUpdate($id)
     {

       $update = $this->common->update(array("userId"=>$id),$_POST,'users');

       if($update)
       {
         $output['success'] ="true";
         $output['success_message'] ="Staff Updated Successfully";
         $output['url'] = base_url().'admin/stafflist';
         $output['delayTime'] ='3000';
       }
       else
       {
         $output['formErrors'] ="true";
         $output['errors'] ="Staff Is Not Updated";
       }
       echo json_encode($output);
       exit;
     }


     public function getstaffperpage()
     {
       if(!empty($_POST['perpage']))
     {
       $perpage =$_POST['perpage'];
     }
     else
     {
       $perpage =10;
     }
     if(!empty($_POST['date']))
     {
      $_POST['date'] = date("Y-m-d", strtotime($_POST['date']));
     }

     $config = array();

     $data['pcount'] = $this->common->count_all_results("users",array("type"=>2));
     $config["total_rows"] = $this->common->count_all_results("users",array("type"=>2));


     $config["base_url"] = base_url() . 'admin/getstaffperpage/';
     $config["per_page"] = $perpage;
     $config["uri_segment"] = 3;
     $this->pagination->initialize($config);
     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
     if( $page <= 0 )
     {
       $page = 1;
     }
     $start = ($page-1) * $config["per_page"];
     $data['start'] = $start;

       $data['result'] = $this->common->allstaff($start,$config["per_page"]);

     $data["links"] = getPaginationlink($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);
     $data['start'] = $start;
     if($data)
     {
       $output['success'] = "true";
       $output['result'] = $data;
     }
     echo json_encode($output);
     exit;
     }

     // staff section



    //************************* forgotPassword********************************
      public function forgotPassword()
      {
        $this->load->view('admin/forgot_password');
      }

    public function forgotcheckemail()
    {
      $mail ='';
      $res = $this->common->getrow('admin',array("email"=>$_POST['email']));

     if(!empty($res))
    {
         $length           = 8;
         $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $random           = rand();
         for ($i = 0; $i < $length; $i++)
         {
         $random .= $characters[rand(0, $charactersLength - 1)];
         }

         $detail['password'] = $random;
         $detail['name'] = 'admin';
          $res = $this->common->update(array("id"=>$res->id),array("password"=>md5($random)),'admin');
         $msg = $this->load->view('email/forgotPassword',$detail,true);
         $mail =  $this->mailer('Reset Password',$_POST['email'],$msg);
        if($mail)
      {
        $output['success'] ="true";
        $output['success_message'] ="Password sent to your email. Please check your email. ";
        $output['resetform'] ='true';
        $output['url'] = base_url().'admin';
        $output['delayTime'] ='3000';
      }
     else
     {
       $output['formErrors'] ="true";
      $output['errors'] ="Error in Email Sending.";
     }
   }
   else
   {
     $output['formErrors'] ="true";
     $output['errors'] ="Email does not exists.";
   }
   echo json_encode($output);
}
    //************************* forgotPassword********************************



   // ********************Order******************************************

    public function mailsend($sub,$to,$msg)
    {
      $ci = & get_instance();
      $ci->email_var = array(
        'site_title' => $ci->config->item('site_title'), 'site_url' => site_url()
      );

      $ci->config_email = Array (
        'protocol' => "smtp",
       'smtp_host' => "ssl://smtp.googlemail.com",
       'smtp_port' => '465',
         'smtp_user' => 'propero.trainee@gmail.com',
        'smtp_pass' => 'Propero@987',
        'mailtype' => "html",
        'wordwrap' => TRUE,
        'crlf' => '\r\n',
        'charset' => "utf-8"
      );

      $ci->email->initialize($ci->config_email);
      $ci->email->set_newline("\r\n");
      $ci->email->from('propero.trainee@gmail.com', 'Api Data');
      $ci->email->to($to);
      $ci->email->subject($sub);
      $ci->email->message($msg);
      if ($ci->email->send()) {
        $ci->email->clear(TRUE);

       return TRUE;

      }
      else
      {
        //echo "no";
	      //echo $ci->email->print_debugger();
       return FALSE;
      }
    }


	public function mailer($sub,$to,$msg)
      {
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';

        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@theguestposting.com', 'oddel');
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);

        if ($this->email->send())
        {
        return true;
        }
        else
        {
          //echo $this->email->print_debugger();
          return false;
        }
      }
  // =============================




}
