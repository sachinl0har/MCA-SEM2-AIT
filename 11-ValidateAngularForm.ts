// form-validation.component.ts
import { Component } from '@angular/core';

@Component({
  selector: 'app-form-validation',
  templateUrl: './form-validation.component.html',
  styleUrls: ['./form-validation.component.css']
})
export class FormValidationComponent {
  formData = {
    name: '',
    email: ''
  };

  submitForm() {
    if (this.myForm.valid) {
      console.log('Form submitted successfully!');
      console.log(this.formData); // You can handle form submission logic here
    } else {
      console.log('Form has validation errors.');
    }
  }
}
