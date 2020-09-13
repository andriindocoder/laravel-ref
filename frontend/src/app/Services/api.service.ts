import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private baseUrl = 'http://localhost:8000/api';

  constructor(
    private http: HttpClient
  ) { }

  signup(data){
    return this.http.post(`${this.baseUrl}/signup`, data);
  }

  login(data){
    return this.http.post(`${this.baseUrl}/login`, data);
  }

  changePassword(data){
    return this.http.post(`${this.baseUrl}/sendPasswordResetLink`, data)
  }

  sendPasswordResetLink(data){
    return this.http.post(`${this.baseUrl}/resetPassword`, data)
  }
}
