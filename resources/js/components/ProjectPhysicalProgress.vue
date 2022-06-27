<template>
  <section class="box mt-4">
    <div class="box__body">
      <div class="d-flex">
        <h5 class="box__title">भौतिक प्रगति</h5>
        <div class="ml-auto">
          <!-- <a href="#" type="button" v-on:click="alert">Edit</a> -->
          <button v-on:click="toggleMode()">Edit</button>
        </div>
      </div>
      <div v-show="mode == 'view-mode'">
        <div>Estimated : {{ physicalProgress.estimate_completed ? "Yes" : "No" }}</div>
        <div>सम्झौता भएको छ ?: {{ physicalProgress.agreement_date_ad ? "Yes".physicalProgress.agreement_date_ad : "No" }}</div>
        <div>शिर्षकगत किसिम : यातायात पूर्वाधार</div>
      </div>
      <form v-show="mode == 'edit-mode'">
        <div class="form-group">
          <label> <input type="checkbox" v-model="form.estimate_completed" value="1" /> Estimate भएको छ ? </label>
        </div>
        <div class="form-group">
          <label for="">सम्झौता भएको मिति </label>
          <v-nepalidatepicker v-model="form.agreement_date_ad" calenderType="Nepali" classValue="form-control" placeholder="YYYY-MM-DD"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <label for="">सम्झौता भएको मिति </label>
          <v-nepalidatepicker v-model="form.agreement_date_ad" calenderType="Nepali" classValue="form-control" placeholder="YYYY-MM-DD"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <label for="">सम्झौता भएको मिति </label>
          <v-nepalidatepicker v-model="form.agreement_date_ad" calenderType="Nepali" classValue="form-control" placeholder="YYYY-MM-DD"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <button type="submit" v-on:click="submit">Update</button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import Form from "form-backend-validation";
import { VueEditor } from "vue2-quill-editor";
import VNepaliDatePicker from "v-nepalidatepicker";

export default {
  components: {
    VueEditor,
    VNepaliDatePicker,
  },
  props: {
    project: {
      default: () => ({}),
    },
    physicalProgress: {
      default: () => ({}),
    },
  },

  data() {
    return {
      mode: "edit-mode",
      updateMode: false,
      date: "",
      form: new Form({
        estimate_completed: false,
        agreement_date_ad: "",
        project_start_date_ad: "",
        project_completion_date_ad: "",
        tender_date_ad: "",
        wip: false,
        followed_up: false,
      }),
    };
  },

  mounted() {
    if (this.project.id) {
      this.updateMode = true;
      this.form.title = this.project.title;
      this.form.organization_id = this.project.organization_id;
      this.form.project_type_id = this.project.project_type_id;
      this.form.budget = this.project.budget;
      this.form.budget_source = this.project.budget_source;
      this.form.description = this.project.description ?? "<div></div>";
    }
  },

  methods: {
    toggleMode() {
      if (this.mode == "view-mode") {
        this.mode = "edit-mode";
      } else {
        this.mode = "view-mode";
      }
    },
    submit() {
      this.updateMode ? this.update() : this.create();
    },

    create() {
      this.form.post("/project").then((response) => {
        alert("Data Saved");
        window.location.href = "/project";
      });
    },

    update() {
      this.form.put(`/project/${this.project.id}`).then((response) => {
        alert("Data Updated");
        window.location.href = "/project";
      });
    },
  },
};
</script>