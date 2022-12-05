### 普通用户：

> 成功插入界面<br>
~~post的单独页面~~<br>
每个人的post记录<br>
~~浏览所有post~~<br>
~~浏览find post~~<br>
~~浏览lost post~~<br>
~~点击跳转查看post的详细信息~~<br>
~~post上传图片~~<br>
修改个人信息<br>


### 管理员：

> 查看/编辑所有user<br>
查看/编辑所有post<br>
统计页面

### 细节：
> 验证输入合法性<br>
ui<br>



list

| Category | Deliverables |
| ---- | ---- |
| User Registration  | Common information: user id, nick name, email, profile image, gender, and birthday <br> Update personal information, including nick name, email and profile image <br> ~~An admin doesn’t need to register an account.~~ |
| User Login  | ~~Two roles: admin and users~~ <br> ~~Use id and password to login. The admin uses default id “admin” and password “adminpass” to login in~~ <br> Remember login status using cookie <br> ~~User logout (and delete cookie)~~ <br> Forget and reset password (for users) |
| User Operations  | Create Notice: A user creates a notice with the following information: type(lost/found), date, venue, contact, description, and image. <br> View Notices: A list page of all pending notices in the system. Each notice has “respond” and “view” buttons <br> View My Notices: A list page of all notices that are created or responded by the user. <br> View Notice Detail: A detailed page of a notice (including response if it is completed) <br> Respond to A Notice: A user responds to a notice by sending a message in the textbox to the owner of the notice. The notice will be marked as completed. |
| Admin Operations  | View List of Registered Users: A list page of all registered users in the ascending order of users’ nick name, showing the number of notices each user created and responded, respectively. <br> View List of Pending/Completed Notices: Two list pages of all pending or completed notices in the system. <br> View List of Notices of A User: A list page of all pending or completed notices in the system created by a user, specified by the user id <br> *(Optional) System Statistics: Use a chart to show the statistics of the number of notices in different age ranges (e.g., [10, 30], [30,50], [50, 70], etc.) among users. |