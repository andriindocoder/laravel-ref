import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/Services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  public loggedIn: boolean;

  constructor(
    private authService: AuthService
  ) { }

  ngOnInit(): void {
    this.authService.authStatus.subscribe( value => this.loggedIn = value);
  }

}
