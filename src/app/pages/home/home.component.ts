import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: [require('../css/bootstrap/css/bootstrap.min.css'),
  require('../css/animate/animate.min.css'),
  require('../css/font-awesome/css/font-awesome.min.css'),
  require('../css/ionicons/css/ionicons.min.css'),
  require('../css/magnific-popup/magnific-popup.css'),
  require('../css/garage-web/plugins/bootstrap/css/bootstrap.css'),
  require('../css/garage-web/plugins/node-waves/waves.css'),
  require('../css/garage-web/plugins/animate-css/animate.css'),
  require('../css/garage-web/css/style.css'),
  require('../css/garage-web/css/themes/all-themes.css'),
  require('../css/style.css'),
]
})
export class HomeComponent implements OnInit {

  constructor() { }

  ngOnInit() {
    console.log(1);
  }

}
