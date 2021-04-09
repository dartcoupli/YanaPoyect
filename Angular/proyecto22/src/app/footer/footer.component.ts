import { Component, OnInit, NgModule } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css'],
  
})

export class FooterComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
  }

  cambiarColorFondo(event: any)
  {
    document.body.style.backgroundColor = event.value;
  }

  
}
