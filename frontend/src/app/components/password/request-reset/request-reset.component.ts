import { Component, OnInit } from '@angular/core';
import { ApiService } from 'src/app/Services/api.service';
import { SnotifyModule } from 'ng-snotify';

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
    private notify: SnotifyModule
  ) { }

  ngOnInit(): void {
  }

  onSubmit() {
    this.apiService.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.notify.error(error.error.error)
    )
  }

  handleResponse(res) {
    this.form.email = null;
  }

}
