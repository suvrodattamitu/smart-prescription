<template>
  <div>
    <div class="breadcome-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcome-list">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="breadcome-heading">
                    <form role="search" class="sr-input-func">
                      <input type="text" placeholder="Search..." class="search-int form-control" />
                      <a href="#">
                        <i class="fa fa-search"></i>
                      </a>
                    </form>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <ul class="breadcome-menu">
                    <li>
                      <router-link to="/">Home</router-link>
                      <span class="bread-slash">/</span>
                    </li>
                    <li>
                      <span class="bread-blod">Dashboard</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div
              class="profile-info-inner"
              v-if="profile.details && profile.details[0] && profile.details[0].image"
            >
              <div class="profile-img">
                <img :src="`/images/profile/${profile.details[0].image}`" alt />
              </div>
              <div class="profile-details-hr">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                      <p>
                        <b>Name</b>
                        <br />
                        {{ profile.name }}
                      </p>
                    </div>
                  </div>
                  <div
                    class="col-lg-6 col-md-12 col-sm-12 col-xs-6"
                    v-if="profile.details && profile.details[0]"
                  >
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Designation</b>
                        <br />
                        {{ profile.details[0].designation }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                    <div class="address-hr">
                      <p>
                        <b>Email ID</b>
                        <br />
                        {{ profile.email }}
                      </p>
                    </div>
                  </div>
                  <div
                    class="col-lg-6 col-md-12 col-sm-12 col-xs-6"
                    v-if="profile.details && profile.details[0]"
                  >
                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                      <p>
                        <b>Phone</b>
                        <br />
                        {{ profile.details[0].phone }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row" v-if="profile.details && profile.details[0]">
                  <div class="col-lg-12">
                    <div class="address-hr">
                      <p>
                        <b>Address</b>
                        <br />
                        {{ profile.details[0].address }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
              <ul id="myTabedu1" class="tab-review-design">
                <li class="active">
                  <a href="#reviews">Biography</a>
                </li>
                <li>
                  <a href="#INFORMATION">Update Details</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content custom-product-edit">
                <div class="product-tab-list tab-pane fade active in" id="reviews">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Full Name</b>
                                <br />
                                {{ profile.name }}
                              </p>
                            </div>
                          </div>
                          <div
                            class="col-lg-3 col-md-3 col-sm-3 col-xs-6"
                            v-if="profile.details && profile.details[0]"
                          >
                            <div class="address-hr biography">
                              <p>
                                <b>Mobile</b>
                                <br />
                                {{ profile.details[0].phone }}
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="address-hr biography">
                              <p>
                                <b>Email</b>
                                <br />
                                {{ profile.email }}
                              </p>
                            </div>
                          </div>
                          <div
                            class="col-lg-3 col-md-3 col-sm-3 col-xs-6"
                            v-if="profile.detaiils && profile.details[0]"
                          >
                            <div class="address-hr biography">
                              <p>
                                <b>Location</b>
                                <br />
                                {{ profile.details[0].address }}
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="row" v-if="profile.details && profile.details[0]">
                          <div class="col-lg-12">
                            <div class="content-profile">
                              <p>{{ profile.details[0].bio }}</p>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Skill Set</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Java</h2>
                              <div class="progress progress-mini">
                                <div style="width: 90%;" class="progress-bar progress-yellow"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Php</h2>
                              <div class="progress progress-mini">
                                <div style="width: 80%;" class="progress-bar progress-green"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>Apps</h2>
                              <div class="progress progress-mini">
                                <div style="width: 70%;" class="progress-bar progress-blue"></div>
                              </div>
                            </div>
                            <div class="progress-skill">
                              <h2>C#</h2>
                              <div class="progress progress-mini">
                                <div style="width: 60%;" class="progress-bar progress-red"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Education</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row mg-b-15">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Experience</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="skill-title">
                                  <h2>Subjects</h2>
                                  <hr />
                                </div>
                              </div>
                            </div>
                            <div class="ex-pro">
                              <ul>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                                <li>
                                  <i class="fa fa-angle-right"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="review-content-section">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input
                                name="number"
                                type="text"
                                v-model="name"
                                class="form-control"
                                placeholder="Name"
                              />
                            </div>
                            <div class="form-group">
                              <select class="form-control" v-model="gender">
                                <option>Select Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                              </select>
                            </div>

                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                v-model="address"
                                placeholder="Address"
                              />
                            </div>

                            <div class="form-group">
                              <textarea
                                class="form-control"
                                rows="5"
                                v-model="bio"
                                placeholder="Bio"
                              ></textarea>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group sm-res-mg-15 tbpf-res-mg-15">
                              <input
                                type="text"
                                class="form-control"
                                v-model="designation"
                                placeholder="Designation"
                              />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                v-model="website_url"
                                placeholder="Website URL"
                              />
                            </div>
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                v-model="phone"
                                placeholder="Phone No."
                              />
                            </div>
                            <div class="form-group">
                              <textarea
                                class="form-control"
                                rows="5"
                                v-model="education"
                                placeholder="Education"
                              ></textarea>
                            </div>
                            <div class="form-group">
                              <input
                                type="file"
                                class="form-control"
                                id="file"
                                @change="onInputChange($event)"
                              />
                              <img
                                v-if="changed_image"
                                :src="changed_image"
                                alt
                                height="80"
                                width="80"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="payment-adress mg-t-15">
                              <button
                                type="submit"
                                class="btn btn-primary waves-effect waves-light mg-b-15"
                                @click="updateProfile"
                              >Update</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
      profile: {},

      name: "",
      phone: "",
      address: "",
      bio: "",
      designation: "",
      gender: "",
      website_url: "",
      education: "",
      changed_image: false,
      image_file: "",
    };
  },

  methods: {
    getCurrentUser() {
      let that = this;
      axios.get("/get-profile").then(function (response) {
        that.profile = response.data.profile[0];
        that.name = response.data.profile[0].name;
        that.gender = 0;
        console.log(response.data);

        if (
          response.data.profile[0].details &&
          response.data.profile[0].details[0]
        ) {
          that.phone = response.data.profile[0].details[0].phone;
          that.address = response.data.profile[0].details[0].address;
          that.bio = response.data.profile[0].details[0].bio;
          that.designation = response.data.profile[0].details[0].designation;
          that.gender = response.data.profile[0].details[0].gender;
          that.website_url = response.data.profile[0].details[0].website_url;
          that.education = response.data.profile[0].details[0].education;
        }
      });
    },

    updateProfile() {
      const formData = new FormData();

      formData.append("name", this.name);
      formData.append("phone", this.phone);
      formData.append("address", this.address);
      formData.append("bio", this.bio);
      formData.append("designation", this.designation);
      formData.append("gender", this.gender);
      formData.append("website_url", this.website_url);
      formData.append("image", this.image_file);
      formData.append("education", this.education);

      let that = this;

      axios
        .post("/update-profile", formData)
        .then(function (response) {
          console.log(response.data);

          that.getCurrentUser();
          Toast.fire({
            icon: "success",
            title: "Profile updated successfully!!!",
          });
        })
        .catch(function (error) {
          that.errors = error.response.data.errors;
          console.log(error.response.data);
        });
    },

    onInputChange(event) {
      const file = event.target.files[0];
      this.image_file = file;

      let that = this;
      let reader = new FileReader();
      reader.onload = (event) => {
        // The file's text will be printed here
        that.changed_image = event.target.result;
      };
      reader.readAsDataURL(file);
    },
  },

  mounted() {
    this.getCurrentUser();
    setTimeout(function () {
      jQuery("#myTabedu1 a").on("click", function (e) {
        e.preventDefault();
        jQuery(this).tab("show");
      });
    }, 200);
  },
};
</script>