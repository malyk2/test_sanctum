<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <div class="row">
              <button @click="login">Login</button>
              <button @click="getUser">Get user</button>
              <button @click="logout">Logout</button>
            </div>
            <div v-if="Object.keys(user).length">
              Name: {{ user.name }}
              Email: {{ user.email }}
            </div>
            <div v-else>
              <h3>No auth user</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {}
    };
  },
  mounted() {
    // console.log("Login mounted.");
    this.getUser();
  },
  methods: {
    login() {
      console.log("Method  login");
      axios.get("/sanctum/csrf-cookie").then(response => {
        const data = {
          email: "test@gmail.com",
          password: "secret"
        };
        axios
          .post("/login", data)
          .then(response => {
            console.log("Then in LOGIN");
          })
          .catch(error => {
            console.log("Catch in LOGIN");
          });
      });
    },
    logout() {
      axios
        .post("/logout")
        .then(response => {
          console.log("Then in LOGOUT");
          this.user = {}
        })
        .catch(error => {
          console.log("Catch in LOGOUT");
        });
    },
    getUser() {
      axios.get("/api/user").then(response => {
        this.user = response.data;
      });
    }
  }
};
</script>
