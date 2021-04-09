import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-searchbar',
  templateUrl: './searchbar.component.html',
  styleUrls: ['./searchbar.component.css']
})
export class SearchbarComponent implements OnInit {
  searchByTitle = false;
  searchByDescription = false;
  searchByText = '';
  
  constructor() { }

  ngOnInit(): void {
  }

}
