import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ApiService } from 'src/app/Services/api.service';

@Component({
  selector: 'app-response-reset',
  templateUrl: './response-reset.component.html',
  styleUrls: ['./response-reset.component.css']
})
export class ResponseResetComponent implements OnInit {
  public error = [];
  public form = {
  	email: null,
  	password: null,
  	password_confirmation: null,
  	resetToken: null
  }

  constructor(
  	private route:ActivatedRoute,
  	private service:ApiService
  ) {
  	route.queryParams.subscribe(params => {
  		this.form.resetToken = params['token']
  	});
  }

  onSubmit() {
  	this.ApiService.changePassword(this.form).subscribe(
  		data => this.handleResponse(data),
  		error => this.handleError(error)
  	)
  }

  handleResponse(data) {

  }

  handleError(data) {

  }

  ngOnInit(): void {
  }

}
