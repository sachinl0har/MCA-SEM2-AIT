// calculator.component.ts
import { Component } from '@angular/core';

@Component({
  selector: 'app-calculator',
  templateUrl: './calculator.component.html',
  styleUrls: ['./calculator.component.css']
})
export class CalculatorComponent {
  result: string = '';
  
  appendToExpression(value: string) {
    this.result += value;
  }

  clearExpression() {
    this.result = '';
  }

  calculateExpression() {
    try {
      this.result = eval(this.result).toString();
    } catch (error) {
      this.result = 'Error';
    }
  }
}
