// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.

export const environment = {
  production: false,
  firebase: {
    apiKey: "AIzaSyC1O0Wm91aQ1pP_y7tTkjDR5WwlF21H2XE",
    authDomain: "kit-web-app.firebaseapp.com",
    databaseURL: "https://kit-web-app.firebaseio.com",
    projectId: "kit-web-app",
    storageBucket: "kit-web-app.appspot.com",
    messagingSenderId: "715230902142"
  }
};
