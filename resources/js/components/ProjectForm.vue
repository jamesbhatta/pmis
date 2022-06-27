<template>
  <div class="box">
    <div class="box__header">
      <div class="box__title">नयाँ परियोजना</div>
    </div>
    <div class="box__body">
      <form @submit.prevent="submit" method="POST">
        <div class="row">
          <div class="form-group col-lg-6">
            <label>शीर्षक</label>
            <input type="text" v-model="form.title" class="form-control" name="title" />
            <small class="text-danger">{{ form.errors.first("title") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label> संगठन</label>
            <select class="custom-select" v-model="form.organization_id">
              <option value="">कृपया संगठन चयन गर्नुहोस्</option>
              <option v-for="organization in organizations" :value="organization.id" :key="organization.id">{{ organization.name }}</option>
            </select>
            <small class="text-danger">{{ form.errors.first("organization_id") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>परियोजना प्रकार</label>
            <select class="custom-select" v-model="form.project_type_id">
              <option value="">परियोजना प्रकार चयन गर्नुहोस्</option>
              <option v-for="type in projectTypes" :value="type.id" v-bind:key="type.id">{{ type.name }}</option>
            </select>
            <small class="text-danger">{{ form.errors.first("project_type_id") }}</small>
          </div>
          <div class="col-lg-6">
            <label class="" for="inlineFormInputGroup">बजेट</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">रु.</div>
              </div>
              <input type="number" v-model="form.budget" class="form-control" id="inlineFormInputGroup" />
            </div>
            <small class="text-danger">{{ form.errors.first("budget") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>बजेट स्रोत</label>
            <input type="text" v-model="form.budget_source" class="form-control" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>खर्च किसिम छान्नुहोस्</label>
            <select v-model="form.expenditure_type" class="custom-select">
              <option value="पुँजीगत खर्च">पुँजीगत खर्च</option>
              <option value="चालु खर्च">चालु खर्च</option>
            </select>
            <small class="text-danger">{{ form.errors.first("expenditure_type") }}</small>
          </div>
          <input type="number" v-model="form.budget" class="form-control" id="inlineFormInputGroup" />
          <div class="form-group col-lg-6">
            <label>बजेट स्रोत</label>
            <input type="text" class="form-control" placeholder="" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>लागत अनुमान</label>
            <input type="text" class="form-control" />
            <small class="text-danger"></small>
          </div>

          <div class="form-group col-lg-6">
            <label>हाल सम्म को वित्तिय प्रगति</label>
            <input type="text" class="form-control" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>

          <div class="form-group col-lg-6">
            <label>हाल सम्म को भौतिक प्रगति</label>
            <input type="text" class="form-control" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>खर्च किसिम छान्नुहोस्</label>
            <input type="text" class="form-control" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>
          <div class="col-lg-6">
            <label class="" for="inlineFormInputGroup">गत आर्थिक वर्षको खर्च हजारमा</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">रु.</div>
              </div>
              <input type="number" class="form-control" id="inlineFormInputGroup" />
            </div>
            <small class="text-danger">{{ form.errors.first("budget") }}</small>
          </div>
          <div class="col-lg-6">
            <label class="" for="inlineFormInputGroup">गत आर्थिक वर्षको भौतिक प्रगति(%) </label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">%</div>
              </div>
              <input type="number" class="form-control" id="inlineFormInputGroup" />
            </div>
            <small class="text-danger">{{ form.errors.first("budget") }}</small>
          </div>
          <div class="form-group col-lg-6">
            <label>लाभाम्वित हुने जनसंख्या</label>
            <input type="text" class="form-control" />
            <small class="text-danger">{{ form.errors.first("budget_source") }}</small>
          </div>

          <div class="form-group col-lg-12">
            <label>विवरण</label>
            <textarea v-model="form.description" cols="30" rows="10" class="form-control"></textarea>
            <small class="text-danger">{{ form.errors.first("description") }}</small>
          </div>
          <button class="btn btn-primary z-depth-0">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "form-backend-validation";
import { VueEditor } from "vue2-quill-editor";

export default {
  components: {
    VueEditor,
  },
  props: {
    organizations: {
      default: () => ({}),
    },
    projectTypes: {
      default: () => ({}),
    },

    project: {
      default: () => ({}),
    },
  },

  data() {
    return {
      updateMode: false,
      form: new Form({
        title: "",
        organization_id: "",
        project_type_id: "",
        budget: "",
        budget_source: "",
        expenditure_type: "",
        description: "<div></div>",
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