import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/Services/api.service';
import { SnotifyService } from 'ng-snotify';

@Component({
  selector: 'app-request-reset',
  templateUrl: './request-reset.component.html',
  styleUrls: ['./request-reset.component.css']
})
export class RequestResetComponent implements OnInit {

  public form = {
    email: null
  }

  constructor(
    private apiService: ApiService,
    private notifyService: SnotifyService
  ) { }

  ngOnInit(): void {
  }

  onSubmit() {
    this.apiService.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.notifyService.error(error.error.error)
    )
  }

  handleResponse(res) {
    console.log(res);
    this.form.email = null;
  }

}
