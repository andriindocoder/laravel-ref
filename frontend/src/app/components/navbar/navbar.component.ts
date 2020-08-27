import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/Services/auth.service';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/Services/token.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  public loggedIn: boolean;

  constructor(
    private authService: AuthService,
    private router:Router,
    private Token: TokenService
  ) { }

  ngOnInit(): void {
    this.authService.authStatus.subscribe( value => this.loggedIn = value);
  }

  logout(event: MouseEvent) {
    event.preventDefault();
    this.Token.remove();
    this.authService.changeAuthStatus(false);
    this.router.navigateByUrl('/login');
  }

}
