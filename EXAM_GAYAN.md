# Laravel Exam - Gayan
## School Management System

**Student Name:** Gayan  
**Duration:** 5 days  
**Total Marks:** 100

---

## Project Overview
Build a School Management System using Laravel 10+ with user authentication, student management, and class administration.

### System Requirement

---

## Task 1: Project Setup (5 marks)
- [ ] Create a new Laravel project using Composer
- [ ] Setup Laravel Breeze for user authentication
- [ ] Initialize Git repository and create GitHub repo
- [ ] Push initial base code to GitHub
- [ ] Configure `.env` file with database credentials
- [ ] Run migrations for auth system

**Acceptance Criteria:**
- Project must be accessible at `http://localhost:8000`
- Authentication (Login/Register) must be working
- Database must be connected and migrations successful

---

## Task 2: Database Design & Migrations (10 marks)

### Table 1: Classes (Master Table)
Create a `classes` table with the following structure:

```sql
Schema::create('classes', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->string('section')->nullable(); // A, B, C, etc.
    $table->integer('academic_year');
    $table->integer('capacity')->default(40);
    $table->string('class_teacher')->nullable();
    $table->string('room_number')->nullable();
    $table->text('description')->nullable();
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

**Requirements:**
- Create migration file
- Seed at least 10 classes using Seeder (DatabaseSeeder)
- Classes: Class 1-A, 1-B, 2-A, 2-B, 3-A, 3-B, 4-A, 4-B, 5-A, 5-B
- Use current year for academic year
- Use Faker for realistic data

### Table 2: Students (Detail Table)
Create a `students` table with the following structure:

```sql
Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
    $table->string('enrollment_number')->unique();
    $table->string('first_name');
    $table->string('last_name');
    $table->string('email')->unique();
    $table->date('date_of_birth');
    $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
    $table->text('address')->nullable();
    $table->string('phone')->nullable();
    $table->string('parent_name')->nullable();
    $table->string('parent_phone')->nullable();
    $table->string('blood_group')->nullable();
    $table->integer('roll_number')->nullable();
    $table->decimal('gpa', 3, 2)->nullable();
    $table->softDeletes();
    $table->foreignId('created_by')->constrained('users')->onDelete('restrict');
    $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('restrict');
    $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('restrict');
    $table->timestamps();
});
```

**Requirements:**
- Create migration file
- Setup soft delete functionality
- Add audit fields (created_by, updated_by, deleted_by)
- Link to users table for audit trail
- Ensure enrollment number is unique per year

---

## Task 3: Authentication & Authorization (5 marks)
- [ ] Complete user registration and login (via Breeze)
- [ ] Setup middleware to protect routes
- [ ] Create dashboard after login
- [ ] Implement logout functionality
- [ ] Test authentication flow

**Acceptance Criteria:**
- Non-authenticated users cannot access student/class pages
- Users can register and login successfully
- Session properly maintained

---

## Task 4: Models & Relationships (10 marks)

### Class Model
```php
// app/Models/Classes.php
class Classes extends Model
{
    // Implement relationship to students
    // Implement scopes if needed
}
```

### Student Model
```php
// app/Models/Student.php
class Student extends Model
{
    // Implement soft deletes
    // Implement relationship to class
    // Implement relationship to creator/updater
}
```

**Requirements:**
- Define all relationships correctly
- Implement eager loading to prevent N+1 queries
- Create scopes for filtering (e.g., `byClass($id)`, `active()`, `topStudents()`, `byGender()`)
- Implement `created_by` relationship
- Calculate age from date_of_birth

---

## Task 5: CRUD Operations for Students (40 marks)

### 5.1 Create Student (8 marks)
- [ ] Create `/students/create` form with validation
- [ ] Form must include: enrollment_number, first_name, last_name, email, date_of_birth, gender, address, phone, parent_name, parent_phone, blood_group, class_id, roll_number
- [ ] Validate email uniqueness
- [ ] Validate enrollment number uniqueness
- [ ] Validate date of birth (not in future, reasonable age range)
- [ ] Validate phone format
- [ ] Set `created_by` automatically to logged-in user
- [ ] Calculate age automatically

**Validation Rules:**
```
enrollment_number: required, string, unique
first_name: required, string, max:255
last_name: required, string, max:255
email: required, email, unique
date_of_birth: required, date, before_or_equal:18 years ago
gender: nullable, in:Male,Female,Other
address: nullable, string
phone: nullable, regex:/^[0-9\-\+\s\(\)]{10,}$/
parent_name: nullable, string, max:255
parent_phone: nullable, regex:/^[0-9\-\+\s\(\)]{10,}$/
blood_group: nullable, in:A+,A-,B+,B-,O+,O-,AB+,AB-
roll_number: nullable, integer, min:1
class_id: required, exists:classes,id
```

### 5.2 List Students (12 marks)
- [ ] Display all students in a table format
- [ ] Show columns: ID, Enrollment Number, Name, Email, Class, Roll Number, Age, Gender, GPA, Parent Phone, Actions
- [ ] Implement pagination (30 per page)
- [ ] Show soft-deleted students separately with restore/force-delete options
- [ ] Add action buttons: View, Edit, Delete
- [ ] Display creator information (created_by user name)
- [ ] Sort by class, roll number
- [ ] Show deleted indicator if student is soft-deleted

### 5.3 Search Functionality (8 marks)
- [ ] Search by student name (first or last)
- [ ] Search by enrollment number
- [ ] Search by email
- [ ] Search by class
- [ ] Filter by gender
- [ ] Filter by blood group
- [ ] Search form on list page
- [ ] Maintain search filters during pagination
- [ ] Advanced filter: age range, GPA range
- [ ] Case-insensitive search

**Example URL:** `GET /students?search=john&class=1&gender=Male&min_age=7&max_age=10`

### 5.4 Show Student (6 marks)
- [ ] Display complete student details
- [ ] Show class information with link to class students
- [ ] Display calculated age
- [ ] Parent contact information
- [ ] Health information (blood group)
- [ ] Display audit trail (created_by user, created_at timestamp)
- [ ] Show updated_by information if available
- [ ] Academic performance (GPA if available)
- [ ] Add back link to student list

### 5.5 Edit Student (6 marks)
- [ ] Pre-populate form with student data
- [ ] Allow updating most fields (enrollment_number may be restricted)
- [ ] Update `updated_by` to logged-in user
- [ ] Validate same rules as create
- [ ] Redirect to list on success
- [ ] Show success message
- [ ] Prevent editing if student is deleted
- [ ] Warn if moving student to different class

---

## Task 6: Audit Fields Implementation (10 marks)

### Requirements:
- [ ] Automatically set `created_by` when student is created
- [ ] Automatically set `updated_by` when student is updated
- [ ] Automatically set `deleted_by` when student is soft-deleted
- [ ] Store current authenticated user ID in these fields
- [ ] Display audit information in list and show views
- [ ] Create controller method to show audit log for each student
- [ ] Show complete modification history

**Example Audit Display:**
```
Created by: John Doe (2024-02-01 10:30)
Updated by: Jane Smith (2024-02-15 14:20)
Last modified 14 days ago

History:
- 2024-02-15: Updated by Jane Smith (Class changed from 1-A to 1-B)
- 2024-02-01: Created by John Doe
```

---

## Task 7: Soft Delete Implementation (10 marks)

### Requirements:
- [ ] Students are soft-deleted, not permanently removed
- [ ] Soft-deleted students don't appear in normal list
- [ ] Create separate view/section to show deleted students
- [ ] Implement restore functionality
- [ ] Implement permanent delete (force delete) functionality
- [ ] Add filter toggle in list "Show All / Active Only / Deleted Only"
- [ ] Test recovery of deleted student
- [ ] Show deleted-at date for soft-deleted records

---

## Task 8: Bonus Features (20 marks) - Optional

### Option A1: Advanced Scopes (7 marks)
```php
// Implement scopes in Student model
$students->active(); // Non-soft-deleted students
$students->byClass($id); // Filter by class
$students->byGender($gender); // Filter by gender
$students->topStudents($limit); // Highest GPA students
$students->recentlyAdded($days); // Added in last N days
$students->adults(); // Students above 18 years old
```

### Option A2: School Dashboard (7 marks)
- [ ] Dashboard showing total students
- [ ] Students by class distribution
- [ ] Top performers section
- [ ] Class-wise statistics
- [ ] Gender distribution chart/graph
- [ ] Recently enrolled students
- [ ] Age distribution analysis

### Option A3: Class Management Features (6 marks)
- [ ] View all students in a class
- [ ] Class capacity warning (when full)
- [ ] Class-wise attendance tracking (bonus)
- [ ] Transfer student between classes
- [ ] Generate class report

### Option B: Academic Performance Tracking (7 marks)
- [ ] Create marks/grades table linked to students
- [ ] Implement one-to-many relationship
- [ ] Display student's academic records
- [ ] Calculate GPA from marks
- [ ] Performance history view
- [ ] Scope for top performers

### Option C: Export & Reports (7 marks)
- [ ] Export student list to CSV by class
- [ ] Export to PDF report with photo placeholder
- [ ] Generate class roster
- [ ] Parent contact directory export
- [ ] Enrollment report with year-over-year comparison

---

## Grading Rubric

| Task | Max Marks | Criteria |
|------|-----------|----------|
| Project Setup | 5 | Git setup, Laravel config, Authentication |
| Database & Migrations | 10 | Table structure, relationships, seeder |
| Authentication | 5 | Breeze setup, middleware, authorization |
| Models & Relationships | 10 | Model definition, relationships, scopes |
| Create Student | 8 | Form validation, audit fields, age calculation |
| List Students | 12 | Pagination, display, soft delete, sorting |
| Search Functionality | 8 | Multiple fields, advanced filters, pagination |
| Show Student | 6 | Detail view, audit info, calculations |
| Edit Student | 6 | Form pre-population, validation, audit |
| Audit Fields | 10 | Automatic tracking, display, trail |
| Soft Delete | 10 | Hidden records, restore, force delete |
| **Subtotal** | **90** | |
| **Bonus Features** | **+20** | Choose at least 2 options |
| **TOTAL** | **100+** | |

---

## Code Quality (Deducted from marks if not met)

| Issue | Deduction |
|-------|-----------|
| Missing comments/documentation | -5 |
| Inconsistent naming conventions | -5 |
| N+1 query problems | -10 |
| No pagination | -5 |
| XSS vulnerabilities | -15 |
| SQL injection risks | -15 |

---

## Submission Checklist

- [ ] GitHub repository created and shared
- [ ] All required files committed
- [ ] `.env.example` file present (without sensitive data)
- [ ] Database migrations working
- [ ] Seeders working (classes pre-seeded)
- [ ] All features working as specified
- [ ] No broken links or 404 errors
- [ ] Application runs without errors
- [ ] README.md with setup instructions included

---

## Setup Instructions (For Evaluator)

```bash
# Clone repository
git clone <repo-url>
cd <project-folder>

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Setup database
php artisan migrate:fresh --seed

# Start server
php artisan serve

# Access: http://localhost:8000
```

---

## Important Notes

1. **Code Quality:** Clean, readable code with proper comments
2. **Git Commits:** Regular commits with meaningful messages
3. **Testing:** Manually test all features thoroughly
4. **Error Handling:** Implement proper error handling and validation
5. **Security:** Use Laravel's built-in security features (CSRF protection, input validation)
6. **Database:** Ensure all migrations are reversible
7. **Master Data:** Classes must be pre-seeded and not have CRUD forms
8. **Age Calculation:** Implement automatic age calculation from DOB

---

## Bonus Points Summary

- **Scopes Implementation:** +3 marks
- **Advanced Relationships:** +4 marks
- **Dashboard/Statistics:** +5 marks
- **Academic Performance:** +4 marks
- **Export & Reporting:** +4 marks

**Maximum Possible Marks: 120**

---

**Deadline:** Submit GitHub link within exam duration  
**Evaluation Date:** [To be decided]
