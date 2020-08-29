<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          {{ HTML::image('admin/dist/img/user2-160x160.jpg', 'User Image', array('class' => 'img-circle')) }}
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{ url('/admin/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/config') }}"><i class="fa fa-circle-o"></i> Config</a></li>
            <!-- <li><a href="{{ url('/admin/customer') }}"><i class="fa fa-circle-o"></i> Customer</a></li> -->
            <li><a href="{{ url('/admin/program') }}"><i class="fa fa-circle-o"></i> Program</a></li>
            <li><a href="{{ url('/admin/section') }}"><i class="fa fa-circle-o"></i> Section</a></li>
            <li><a href="{{ url('/admin/session') }}"><i class="fa fa-circle-o"></i> Session</a></li>
            <li><a href="{{ url('/admin/subject') }}"><i class="fa fa-circle-o"></i> Subject</a></li>
            <li><a href="{{ url('/admin/exam') }}"><i class="fa fa-circle-o"></i> Exam</a></li>
            <li><a href="{{ url('/admin/department') }}"><i class="fa fa-circle-o"></i> Department</a></li>
            <li><a href="{{ url('/admin/designation') }}"><i class="fa fa-circle-o"></i> Designation</a></li>
            <li><a href="{{ url('/admin/class-level') }}"><i class="fa fa-circle-o"></i> Class Level</a></li>
            <li><a href="{{ url('/admin/group') }}"><i class="fa fa-circle-o"></i> Group</a></li>
            <li><a href="{{ url('/admin/medium') }}"><i class="fa fa-circle-o"></i> Medium</a></li>
            <li><a href="{{ url('/admin/shift') }}"><i class="fa fa-circle-o"></i> Shift</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Admission</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/admission-subject') }}"><i class="fa fa-circle-o"></i>Admission Exam Subject</a></li>
            <li><a href="{{ url('/admin/admission-offer') }}"><i class="fa fa-circle-o"></i> Admission Offer</a></li>
            <li><a href="{{ url('/admin/admission-exam') }}"><i class="fa fa-circle-o"></i> Admission Exam</a></li>
            <li><a href="{{ url('/admin/applicant-registration') }}"><i class="fa fa-circle-o"></i> Applicant Registration</a></li>
            <li><a href="{{ url('/admin/admission-mark') }}"><i class="fa fa-circle-o"></i> Admission Mark</a></li>
            <li><a href="{{ url('/admin/applicant-result') }}"><i class="fa fa-circle-o"></i> Applicant Result</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Teacher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/teacher') }}"><i class="fa fa-circle-o"></i>Teacher</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Class/Program</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/program-offer') }}"><i class="fa fa-circle-o"></i>Program Offer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Subject</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/subject-offer') }}"><i class="fa fa-circle-o"></i>Subject Offer</a></li>
            <li><a href="{{ url('/admin/merge-subject') }}"><i class="fa fa-circle-o"></i>Merge Subject</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/admin/student-promotion') }}"><i class="fa fa-circle-o"></i>Promotion</a></li>
            <li><a href="{{ url('/admin/student-subject-offer') }}"><i class="fa fa-circle-o"></i>Subject Offer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Report/List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/sale-report') }}"><i class="fa fa-circle-o"></i>Student Result Position</a></li>
            <li><a href="{{ url('/purchase-report') }}"><i class="fa fa-circle-o"></i> Student Transcript</a></li>
            <li><a href="{{ url('/customer-report') }}"><i class="fa fa-circle-o"></i> Student Tabulation Sheet</a></li>
            <li><a href="{{ url('/supplier-report') }}"><i class="fa fa-circle-o"></i> Supplier Report</a></li>
            <li><a href="{{ url('/stock-report') }}"><i class="fa fa-circle-o"></i> Stock Report</a></li>
            <li><a href="{{ url('/money-receipt-report') }}"><i class="fa fa-circle-o"></i> MoneyReceipt Report</a></li>
            <li><a href="{{ url('/cash-report') }}"><i class="fa fa-circle-o"></i> Cash Report</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @role('super-admin')
            <li><a href="{{ url('/admin/role') }}"><i class="fa fa-circle-o"></i>Role</a></li>
          @endrole
            <li><a href="{{ url('/admin/user') }}"><i class="fa fa-circle-o"></i> User</a></li>
            <li><a href="{{ url('/admin/permission') }}"><i class="fa fa-circle-o"></i> Permission</a></li>
          </ul>
        </li>
      </ul>
    </section>