<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Report
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Report extends CI_Controller
{
    
  public function __construct()
  {
      parent::__construct();
        //Load Model
        $this->load->model('Dashboard_model');
        $data['username'] = $this->Dashboard_model->username();
        //Load Model
        $this->load->model('Report_model');
        //Already logged In
        if (!$this->session->has_userdata('user_id')) {
            redirect('/LoginController/logout');
        }
  }

  public function InvReport(){
    $data['page_title'] = 'Inventory Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['inventory'] = $this->Report_model->inventory();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('reports/inventory_report',$data);
    $this->load->view('reports/footer');
  }

  public function delete(){
    $id =  $this->input->post('id');
    $this->Report_model->delete_item($id); //29
  }

  public function edit(){
    $expense_id =  $this->uri->segment('3');
    $data['page_title'] = 'Edit Inventory';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    //Total Expenses for this month
    $data['total_expense'] = $this->Expense_model->total_expense(); //16

    //Expense data
    $data['expenses'] = $this->Expense_model->edit_expense($expense_id); //35

    //Item Catogiries
    $data['catogories'] = $this->Inventory_model->item_catogories();

    $data['location'] = $this->Orders_model->locations();

    $data['nav'] = "Expense";
  $data['subnav'] = "Expenses";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('expense/edit-expense',$data);
    $this->load->view('expense/footer',$data);
  }
  public function index()
  {
        $data['page_title'] = 'Reports';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/index',$data);
        $this->load->view('orders/footer');
  }

  public function Order()
  {
        $data['page_title'] = 'Order - Report';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/order_report',$data);
        $this->load->view('orders/footer');
  }

  public function Finance()
  {
        $data['page_title'] = 'Finance - Report';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/finance_report',$data);
        $this->load->view('orders/footer');
  }

}


/* End of file Report.php */
/* Location: ./application/controllers/Report.php */