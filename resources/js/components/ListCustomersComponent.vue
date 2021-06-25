<template>
  <div class="container">
    <h1>Phone Numbers</h1>

    <div class="row">
      <div class="col-md-10">
        <div class="card">

          <div class="card-header">

            <div class="row">
              <div class="col-md-6">

                <select v-on:change="getCustomersByFilter()" v-model="country" class="custom-select">
                  <option disabled value="">Select country</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Uganda">Uganda</option>
                </select>

                <select v-on:change="getCustomersByFilter()" v-model="phoneState" class="custom-select">
                  <option disabled value="">Filter by phone state</option>
                  <option value="true">Valid</option>
                  <option value="false">Not Valid</option>
                </select>

              </div>
              <div class="col-md-6">
                <button type="button" @click="clearFilters()" style="float:right" class="btn btn-outline-dark">Clear
                  Filters
                </button>
              </div>
            </div>
          </div>


          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">Country Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">State</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="customer in customers">
                <th scope="row">{{ customer.id }}</th>
                <td>{{ customer.name }}</td>
                <td>{{ customer.country }}</td>
                <td>{{ customer.country_code_with_plus }}</td>
                <td>{{ customer.phone_number }}</td>
                <td>{{ customer.phone_state ? ("OK") : ("NOK") }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>PhoneNotValid

<script>
export default {
  data() {
    return {
      customers: [],
      filters: {},
      phoneState: "",
      country: ""
    }
  },
  methods: {
    getCustomersByFilter() {
      if (this.phoneState) {
        this.filters.PhoneState = this.phoneState
      }

      if (this.country) {
        this.filters.Country = this.country
      }

      axios.get('/api/customers', {
        params: this.filters
      })
          .then((response) => {

            this.customers = response.data.data
          })

      this.filters = {};
    },
    clearFilters() {
      this.phoneState = "";
      this.country = "";
      this.filters = {};
      this.getCustomersByFilter()
    }
  },
  mounted() {
    this.getCustomersByFilter()
  }
}
</script>
