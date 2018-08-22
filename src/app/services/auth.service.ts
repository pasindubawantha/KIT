import { Injectable } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Router } from '@angular/router';
import { AngularFireAuth } from 'angularfire2/auth';
import { AngularFireDatabase } from 'angularfire2/database';

// import { AngularFire, AuthProviders, AuthMethods } from 'angularfire2/auth';
import { UserService } from './user.service';

@Injectable()
export class AuthService {
  authState: any = null;
  user: any = null;
  message: string = null;
  uid: any = null;
  displayName: any = null;
  email: any = null;
  medata: any = null;
  newUser: any = false;

  constructor(private firebaseAuth: AngularFireAuth, db: AngularFireDatabase, private userService: UserService) {
    this.user = firebaseAuth.authState;

    this.firebaseAuth.authState.subscribe(user => {
      if (user) {
        this.uid = user.uid;
        this.email = user.email;
        this.medata =  user.metadata;
        if (this.newUser) {
          //this.userService.newUser(this.uid, this.email, this.displayName);
         }
        else {

        }
      } else {
        this.uid = null;
      }
    });
  }
  signup(email: string, password: string) {
    this.firebaseAuth
      .auth
      .createUserWithEmailAndPassword(email, password)
      .then(value => {
        console.log('Success!');
        this.newUser = true;

      })
      .catch(err => {
        console.log('Something went wrong:', err.message);
      });
  }
  login(email: string, password: string) {
    this.firebaseAuth
      .auth
      .signInWithEmailAndPassword(email, password)
      .then(value => {
        console.log('Nice, it worked!');
      })
      .catch(err => {
        console.log('Something went wrong:', err.message);
        this.message = err.message;
      });
  }

  logout() {
    this.firebaseAuth
      .auth
      .signOut()
      .then(value => {
        console.log(value);
      })
      .catch(err => {
        console.log(err);
      });
  }
}
