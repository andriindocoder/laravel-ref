import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/Services/api.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  public form = {
    email: null,
    password: null
  }

  public error = null;

  constructor(
    private apiService: ApiService
  ) {

  }

  ngOnInit(): void {
  }

  onSubmit() {
    this.apiService.login(this.form).subscribe( 
        data => console.log(data),
        error => this.handleError(error)
      );
  }

  handleError(error) {
    console.log(error.error.error);
    this.error = error.error.error;
  }

}
