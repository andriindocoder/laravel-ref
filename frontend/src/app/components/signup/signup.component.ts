import { Component,  OnInit } from '@angular/core';
import { ApiService } from '../../Services/api.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  public form = {
    name: null,
    email: null,
    password: null,
    password_confirmation: null
  };

  public error = [];

  constructor(
    private apiService: ApiService
  ) { }

  ngOnInit(): void {
  }

  onSubmit() {
    this.apiService.signup(this.form).subscribe( 
        data => console.log(data),
        error => this.handleError(error)
      );
  }

  handleError(error) {
    this.error = error.error.errors;
  }

}
