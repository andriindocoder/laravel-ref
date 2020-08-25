import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/Services/api.service';
import { TokenService } from 'src/app/Services/token.service';

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
    private apiService: ApiService,
    private tokenService: TokenService
  ) {

  }

  ngOnInit(): void {
  }

  onSubmit() {
    this.apiService.login(this.form).subscribe( 
        data => this.handleResponse(data),
        error => this.handleError(error)
      );
  }

  handleResponse(data) {
    this.tokenService.handle(data.access_token);
  }

  handleError(error) {
    console.log(error.error.error);
    this.error = error.error.error;
  }

}
