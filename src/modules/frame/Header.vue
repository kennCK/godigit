 <template>
  <div>
    <nav class="header-navbar">
      <!--- 

              Header Brand 

      -->
      <div class="header-navbar-brand">
        <a class="navbar-brand" href="#">
          <img src="../../assets/img/godigit-white.png" height="40" width="40">
          <label class="navbar-brand">Go<b>Digit</b></label>
        </a>
      </div>
      <!--- 

              Header icons 

      -->
      <span class="header-navbar-icons" data-toggle="popover" title="Company Branches" data-placement="bottom" data-popover-content='#myBranches' v-on:click="fetchBranches(0)">
        <i class="fa fa-th-large" aria-hidden="true"></i>
      </span>

      <div id="myBranches" class="popover-menu collapse">
        <span></span>
        <span></span>
        <span v-for="item in branches" v-on:click="loadBranch(item.company_branches.company_id, item.company_branch_id)">
          <img src="../../assets/img/godigit.png" height="40" width="40">
          {{item.company_branches.code}}
        </span>
      </div>

      <span class="header-navbar-icons" data-toggle="popover" title="Messages" data-placement="bottom" data-popover-content='#myMessages' v-on:click="fetchBranches(1)">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
      </span>

      <div id="myMessages" class="popover-menu collapse">
        <span v-for="item in branches" v-on:click="loadBranch(item.company_branches.company_id, item.company_branch_id)">
          <img src="../../assets/img/godigit.png" height="40" width="40">
          {{item.company_branches.code}}
        </span>
      </div>

      <span class="header-navbar-icons" data-toggle="popover" title="Notifications" data-placement="bottom" data-popover-content='#myNotifications' v-on:click="fetchBranches(2)">
        <i class="fa fa-bell-o" aria-hidden="true"></i>
      </span>

      <div id="myNotifications" class="popover-menu collapse">
        <span v-for="item in branches" v-on:click="loadBranch(item.company_branches.company_id, item.company_branch_id)">
          <img src="../../assets/img/godigit.png" height="40" width="40">
          {{item.company_branches.code}}
        </span>
      </div>
      <!--- 

              Header Profile 

      -->
      <div class="header-navbar-nav" data-toggle="modal" data-target="#logoutModal">
         <span>
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <label>Hi {{user.username}}!</label>
         </span>  
      </div>
      <!--- 

              Header Menu Toggler 

      -->
      <span class="navbar-menu-toggler-md" data-toggle="collapse" data-target="#godigitSidebar" aria-controls="godigitSidebar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </span>
    </nav>
   <!--- 

              Header Modal

      -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Hi {{user.username}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to logout?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger-hallow" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> No</button>
            <button type="button" class="btn btn-primary-hallow" v-on:click="logOut()" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Yes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ROUTER from '../../router'
import AUTH from '../../services/auth'
export default {
  mounted(){
    this.fetchBranches()
  },
  data(){
    return{
      user: AUTH.user,
      tokenData: AUTH.tokenData,
      branches: [],
      popover: ['myBranches', 'myMessages', 'myNotifications']
    }
  },
  methods: {
    logOut(){
      AUTH.deaunthenticate()
      ROUTER.push('/')
    },
    fetchBranches(){
      this.getBranches()
      $('[data-toggle="popover"]').popover({
        container: 'body',
        html: true,
        content: function () {
          let clone = $($(this).data('popover-content')).clone(true).removeClass('collapse')
          return clone
        }
      })
    },
    getBranches(){
      let parameter = {
        'condition': [{
          'column': 'account_id',
          'value': this.user.userID,
          'clause': '='
        }],
        'with_foreign_table': [
          'company_branches'
        ]
      }
      this.APIRequest('company_branch_employee/retrieve', parameter).then(response => {
        this.branches = response.data
      })
    },
    loadBranch(companyID, companyBranchID){
      // alert(companyID + ' ' + companyBranchID)
    }
  }
}
</script>
<style type="text/css">
 .header-navbar{
    background: #006600;
    height: 50px;
  }/*-- navbar --*/
  .header-navbar-brand{
    float: left;
    height: 50px;
    margin-left: 1%;
    font-size: 24px;
    width: 72%;
  }
  .header-navbar .navbar-brand{
    color: #fff;
  }
  
/*---------------------------------------------
  HEADER ICONS
      Contents: 
          *Branch Switcher
          *Messages
-----------------------------------------------*/
  .header-navbar-icons{
    height: 50px;
    float: left;
    text-align: center;
    font-size: 16px; 
    width: 4%;
    color: #fff;
    padding: 10px 0 15px 0;
  }
  .header-navbar-icons:hover{
    cursor: pointer;
    background: #009900;
  }

/*---------------------------------------------
 

        HEADER ACCOUNT PROFILE


-----------------------------------------------*/
  .header-navbar-nav{
      height: 50px;
      float: left;
      color: #fff;
      width: 15%;
  }
  .header-navbar-nav label{
    font-size: 13px;
    font-weight: 500;
    vertical-align: middle;
    padding-left: 10px;
  }
  .header-navbar-nav i{
    font-size: 24px;
     padding: 10px 0 0 5%;
  }

  .header-navbar-nav:hover{
    cursor: pointer;
    background: #009900;
  }
/*---------------------------------------------
 
 
        HEADER TOGGLER MENU


-----------------------------------------------*/
  .navbar-menu-toggler-md{
    height: 50px;
    float: left;
    text-align: center;
    font-size: 16px;
    color: #fff;
    padding: 10px 0 15px 0;
    display: none;
  }
  .navbar-menu-toggler-md:hover{
    cursor: pointer;
    background: #009900;
  }

/*---------------------------------------------
 
 
        HEADER POPOVER


-----------------------------------------------*/
.popover{
  background: #fff;
  max-width: 275px;
}
.popover-title{
  color: #006600;
}
.popover-content{
  margin: 0 !important;
  padding: 0 !important;
  width: 270px;
  max-height: 200px;
  overflow-y: scroll;
}
.popover-menu{
  width: 100%;
  background: #fff;
}
.popover-menu span{
  width: 100%;
  float: left;
  height: 50px;
}
.popover-menu img{
  height: 40px;
  width: 40px;
  margin: 5px 5% 5px 5%;
}
.popover-menu span:hover{
  background: #eee;
  cursor: pointer;
}
/*---------------------------------------------------------          

                  RESPONSIVE HANDLER

-----------------------------------------------------------*/
/*-------------- Medium and Large Screens for Tablets and Desktop --------------*/

 @media screen (min-width: 992px), screen and (max-width: 1199px){
    .header-navbar-brand{
      width: 69%;
    }
    .header-navbar-icons{
      width: 5%
    }
    .header-navbar-nav{
      width: 15%;
    }
    .navbar-menu-toggler-md{
      display: none;
    }
  }

@media screen (min-width: 768px), screen and (max-width: 991px){
   .header-navbar-brand{
      width: 55%;
    }
    .header-navbar-icons{
      width: 6%
    }
    .header-navbar-nav{
      width: 20%;
    }
    .navbar-menu-toggler-md{
      width: 6%;
      text-align: center;
      display: block;
    }
 }

/*-------------- Small Screen for Mobile Phones --------------*/
 @media (max-width: 767px){
    .header-navbar-nav span label, .header-navbar-brand img{
      display: none;
    }
    .header-navbar-brand{
      width: 49%;
    }
    .header-navbar-icons, .header-navbar-nav{
      width: 10%
    }
    .header-navbar-nav{
      text-align: center;
    }
    .navbar-menu-toggler-md{
      width: 10%;
      text-align: center;
      display: block;
    }
  }
</style>
