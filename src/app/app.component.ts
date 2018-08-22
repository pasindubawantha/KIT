import { Component } from '@angular/core';
import { AuthService } from './services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';
  private isLoggedIn: Boolean;
  private user_displayName: String;
  private user_email: String;
  constructor(public authService: AuthService, private router: Router) {
    this.authService.af.auth.subscribe(
      (auth) => {
        if (auth == null) {
          console.log("Logged out");
          this.isLoggedIn = false;
          this.user_displayName = '';
          this.user_email = '';
          this.router.navigate(['login']);
        } else {
          this.isLoggedIn = true;
          this.user_displayName = auth.EmailAuthProvider.displayName;
          this.user_email = auth.EmailAuthProvider.email;
          console.log("Logged in");
          console.log(auth);
          this.router.navigate(['dashboard']);
        }
      }
    );
}
