import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})
export class LoginComponent implements OnInit {

  constructor( private auth: AuthService) {

   }

  ngOnInit() {
    console.log(1);
    this.auth.signup("test.email7@gmail.com" , "1234567");
  }

}
