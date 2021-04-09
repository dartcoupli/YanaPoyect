import { Injectable } from '@angular/core';
import { user } from '../models/user.model';
//import { User } from './username/model.user';

@Injectable({
  providedIn: 'root'
})
export class UserloginService {

  param: string;
 




};

/*getUserLogin(usmail, uspass)
{
  this.param = '{"usemail":"' + usmail + '","uspassword":"' + uspass + '"}';

  return this.http.post('/api/login', this.param, this.httpOptions);
}*/
