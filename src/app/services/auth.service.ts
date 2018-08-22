import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';
import { AngularFireAuthModule } from 'angularfire2/auth';
import { AngularFireDatabaseModule } from 'angularfire2/database';

import { AngularFire, AuthProviders, AuthMethods } from 'angularfire2';

@Injectable()
export class AuthService {
  authToken: any;
  user: any;
  constructor(public af: AngularFire) { }
  loginWithGoogle() {
    return this.af.auth.login({
      provider: AuthProviders.EmailAuthProvider,
      method: AuthMethods.Popup
    });
  }
  logout() {
    return this.af.auth.logout();
  }
  //constructor(private auth: AngularFireAuthModule, private router: Router, private db: AngularFireDatabaseModule) {}

  // loggedIn() {
  //   const browser_token = sessionStorage.getItem('id_token');
  //   if (this.authToken === null) {
  //     return false; // change to false
  //   }
  //   if (!browser_token) {
  //     return false; // change to false
  //   }
  //   if (browser_token === this.authToken) {
  //     return true;
  //   }
  //   return false; // change to false
  // }

  // authenticateUser(user: any): Observable<IStudentAuth> {
  //   const _url = 'http://localhost:9080/login/member/';
  //   const headers = new HttpHeaders();
  //   headers.append('Content-Type', 'application/json');
  //   return this.http.post<IStudentAuth>(_url, user, {headers: headers});
  // }

  // // registerUser(user) {
  // //   const headers = new Headers();
  // //   headers.append('Content-Type', 'application/json');
  // //   return this.http.post('users/register', user, {headers: headers})
  // //     .map(res => res.json());
  // // }

  // // getProfile() {
  // //   const headers = new Headers();
  // //   this.loadToken();
  // //   headers.append('Authorization', this.authToken);
  // //   headers.append('Content-Type', 'application/json');
  // //   return this.http.get('users/profile', {headers: headers})
  // //     .map(res => res.json());
  // // }

  // storeUserData(token, user) {
  //   sessionStorage.setItem('id_token', token);
  //   sessionStorage.setItem('user', JSON.stringify(user));
  //   this.authToken = token;
  //   this.user = user;
  // }

  // // loadToken() {
  // //   const token = localStorage.getItem('id_token');
  // //   this.authToken = token;
  // // }

  // logout() {
  //   this.authToken = null;
  //   this.user = null;
  //   sessionStorage.clear();
  //   this.router.navigate(['/login']);
  }
}
