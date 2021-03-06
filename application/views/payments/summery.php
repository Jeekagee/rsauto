
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Summery</h3>
        <div id="delete_msg">
          <?php
            if ($this->session->flashdata('delete')) {
              echo $this->session->flashdata('delete');
            }
          ?>
        </div>
            <div style="margin-bottom: 10px;" >
                <a href="<?php echo base_url(); ?>Employees/Add" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div>
        <div class="row mb">
            
          <!-- page start-->
          <div class="content-panel" style="padding:20px 20px 2px 20px;">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#No</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Salary(LKR)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $i =1;
                  foreach ($employees as $employee){
                    ?>
                      <tr class="gradeX">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $employee->emp_id; ?></td>
                        <td><?php echo $employee->emp_name; ?></td>
                        <td><?php echo $employee->emp_salary; ?></td>
                        
                        <td class="text-center">
                          <a href="<?php echo base_url(); ?>Payments/Pay/<?php echo $employee->id; ?>" class="btn btn-success btn-sm">Pay</a>
                        </td>
                      </tr>
                    <?php
                    $i++;
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  