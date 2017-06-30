 <template>
  <div>
    <nav class="header-navbar">
      <div class="header-navbar-brand">
        <a class="navbar-brand" href="#">
          <img src="../../assets/img/godigit-white.png" height="40" width="40">
          <label><b>Go</b>Digit</label>
        </a>
      </div>
      <div class="header-navbar-nav">
          <span class="header-navbar-link"  data-toggle="modal" data-target="#logoutModal">
            <span>Hi {{user.username}}!</span>
            <i class="fa fa-user-circle" aria-hidden="true"></i>
          </span>
      </div>
      <span class="navbar-menu-toggler-md" data-toggle="collapse" data-target="#godigitSidebar" aria-controls="godigitSidebar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </span>
    </nav>
    <!-- Modal -->
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
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
            <button type="button" class="btn btn-primary" v-on:click="logOut()"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</button>
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
  },
  data(){
    return{
      user: AUTH.user,
      tokenData: AUTH.tokenData
    }
  },
  methods: {
    logOut(){
      AUTH.deaunthenticate()
      ROUTER.push({
        path: '/'
      })
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
    width: 70%;
    float: left;
    height: 50px;
    margin-left: 1%;
    font-size: 24px;
  }
  .header-navbar .navbar-brand{
    color: #fff;
  }
  .header-navbar-nav{
    list-style: none;
    width: 22%;
    height: 50px;
    margin-right: 1%;
    float: left;
    text-align: right;
    color: #fff;
  }
  .header-navbar-nav span span{
    font-size: 16px;
    vertical-align: middle;
  }
  .header-navbar-nav i{
    font-size: 40px;
    vertical-align: middle;
    padding-top: 5px;
    padding-bottom: 5px;
  }

  .header-navbar-nav span:hover{
    cursor: pointer;
    color: #ddd;
  }
  .navbar-menu-toggler-md{
    width: 4%;
    height: 50px;
    float: right;
    color: #fff;
    text-align: center;
    vertical-align: middle;
    font-size: 100%;
    display: none;
    margin-right: 1%;
  }
  .navbar-menu-toggler-md:hover{
    cursor: pointer;
    background: #fff;
    color: #006600;
  }
  @media (min-width: 992px){
    .header-navbar-nav{
      width: 28%;
    }
  }
  @media (max-width: 991px){
    .navbar-menu-toggler-md{
      display: block;
    }
  }
</style>
