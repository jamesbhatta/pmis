<template>
  <div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="">Amount</label>
        <input type="number" v-model="form.amount" class="form-control" />
        <small class="text-danger">{{ form.errors.first("amount") }}</small>
      </div>
      <div class="form-group col-md-6">
        <label for="">Date</label>
        <v-nepalidatepicker v-model="form.date" calenderType="Nepali" classValue="form-control" :placeholder="form.date"></v-nepalidatepicker>
        <small class="text-danger">{{ form.errors.first("date") }}</small>
      </div>
    </div>
    <div class="form-group">
      <label for="">Remarks</label>
      <textarea v-model="form.remarks" class="form-control"></textarea>
        <small class="text-danger">{{ form.errors.first("remarks") }}</small>
    </div>
    <div class="form-group">
      <label> <input type="checkbox" v-model="form.is_last_payment" value="1" /> Is last payment? </label>
        <small class="text-danger">{{ form.errors.first("is_last_payment") }}</small>
    </div>
    <div class="form-group text-right">
      <button v-on:click.prevent="submit" class="btn btn-primary z-depth-0">Save</button>
    </div>
  </div>
</template>

<script>
import Form from "form-backend-validation";
import VNepaliDatePicker from "v-nepalidatepicker";

export default {
  components: {
    VNepaliDatePicker,
  },

  props: {
    project: {
      default: () => ({}),
    },
    economicProgress: {
      default: () => ({}),
    },
  },

  data() {
    return {
      updateMode: false,
      form: new Form(
        {
          date: "",
          amount: "",
          remarks: "",
          is_last_payment: false,
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },

  mounted() {
    if (this.economicProgress.id) {
      this.updateMode = true;
      this.form.amount = this.economicProgress.amount;
      this.form.date = this.economicProgress.date;
      this.form.remarks = this.economicProgress.remarks;
      this.form.is_last_payment = this.economicProgress.is_last_payment;
    }
  },

  methods: {
    submit() {
      this.updateMode ? this.update() : this.create();
    },

    create() {
      this.form.post(`/project/${this.project.id}/economic-progress`).then((response) => {
        alert("Data Saved");
        window.location.reload();
      });
    },

    update() {
      //   this.form.put(`/project/${this.project.id}`).then((response) => {
      //     alert("Data Updated");
      //     window.location.href = "/project";
      //   });
    },
  },
};
</script>