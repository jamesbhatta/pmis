<template>
  <section class="box mt-4">
    <div class="box__body">
      <div class="d-flex mb-3">
        <h5 class="box__title">भौतिक प्रगति</h5>
        <div class="ml-auto">
          <!-- <a href="#" type="button" v-on:click="alert">Edit</a> -->
          <button v-on:click="toggleMode()">Edit</button>
        </div>
      </div>
      <div v-show="mode == 'view-mode'">
        <table class="table table-hover">
          <tr>
            <td>लागत अनुमान बनेको छ ?</td>
            <td>{{ physicalProgress.estimate_completed ? "छ" : "छैन" }}</td>
          </tr>
          <tr>
            <td>सम्झौता भएको छ ?</td>
            <td>{{ physicalProgress.agreement_date ? "छ" : "छैन" }}</td>
          </tr>
          <tr>
            <td>सम्झौता भएको मिति</td>
            <td>{{ physicalProgress.agreement_date }}</td>
          </tr>
          <tr>
            <td>@lang('navigation.project_start_date')</td>
            <td>{{ physicalProgress.project_start_date }}</td>
          </tr>
          <tr>
            <td>@lang('navigation.project_completion_date')</td>
            <td>{{ physicalProgress.project_completion_date }}</td>
          </tr>
          <tr>
            <td>@lang('navigation.tender_date')</td>
            <td>{{ physicalProgress.tender_date }}</td>
          </tr>
          <tr>
            <td>काम हुदै छ ?</td>
            <td>{{ physicalProgress.wip ? "छ" : "छैन" }}</td>
          </tr>
          <tr>
            <td>अनुगमन हुदै छ ?</td>
            <td>{{ physicalProgress.followed_up ? "छ" : "छैन" }}</td>
          </tr>
        </table>
      </div>

      <form v-show="mode == 'edit-mode'">
        <div class="form-group">
          <label> <input type="checkbox" v-model="form.estimate_completed" value="1" /> लागत अनुमान बनेको छ ? </label>
          <small class="text-danger">{{ form.errors.first("estimate_completed") }}</small>
        </div>
        <div class="form-group">
          <label for="">सम्झौता भएको मिति </label>
          <v-nepalidatepicker v-model="form.agreement_date" calenderType="Nepali" classValue="form-control" :placeholder="form.agreement_date"></v-nepalidatepicker>
          <small class="text-danger">{{ form.errors.first("agreement_date") }}</small>
        </div>
        <div class="form-group">
          <label for="">Project Start Date </label>
          <v-nepalidatepicker v-model="form.project_start_date" calenderType="Nepali" classValue="form-control" :placeholder="form.project_start_date"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <label for="">Project Completion Date </label>
          <v-nepalidatepicker v-model="form.project_completion_date" calenderType="Nepali" classValue="form-control" :placeholder="form.project_completion_date"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <label for="">Tender Date</label>
          <v-nepalidatepicker v-model="form.tender_date" calenderType="Nepali" classValue="form-control" :placeholder="form.tender_date"></v-nepalidatepicker>
        </div>
        <div class="form-group">
          <label> <input type="checkbox" v-model="form.wip" value="1" /> काम हुदै छ ? </label>
          <small class="text-danger">{{ form.errors.first("wip") }}</small>
        </div>
        <div class="form-group">
          <label> <input type="checkbox" v-model="form.followed_up" value="1" /> अनुगमन हुदै छ ? </label>
          <small class="text-danger">{{ form.errors.first("followed_up") }}</small>
        </div>
        <div class="form-group">
          <button type="submit" v-on:click.prevent="submit" class="btn btn-primary z-depth-0 ml-0">Update</button>
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
      mode: "view-mode",
      updateMode: false,
      date: "",
      form: new Form(
        {
          estimate_completed: false,
          agreement_date: "",
          project_start_date: "",
          project_completion_date: "",
          tender_date: "",
          wip: false,
          followed_up: false,
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },

  mounted() {
    if (this.project.id) {
      this.updateMode = true;
      this.form.estimate_completed = this.physicalProgress.estimate_completed;
      this.form.agreement_date = this.physicalProgress.agreement_date;
      this.form.project_start_date = this.physicalProgress.project_start_date;
      this.form.project_completion_date = this.physicalProgress.project_completion_date;
      this.form.tender_date = this.physicalProgress.tender_date;
      this.form.wip = this.physicalProgress.wip;
      this.form.followed_up = this.physicalProgress.followed_up;
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
      this.form.post(`/project/${this.project.id}/physical-progress`).then((response) => {
        this.$swal(response.message).then(() => window.location.reload());
      });
    },
  },
};
</script>