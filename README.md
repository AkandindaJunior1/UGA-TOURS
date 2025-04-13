# UgaTours - Tourism Website

Welcome to **UgaTours**! This platform helps people discover and book amazing tours in Uganda. Whether you're a local or an international visitor, UgaTours makes it easy to explore Uganda's beautiful destinations.


## About UgaTours
UgaTours is designed to simplify and enhance tourism in Uganda. We provide:
- Information about tourist attractions.
- Curated tour packages for different interests and budgets.
- A seamless booking process to make trip planning stress-free.

### 1. Mission
Our mission is to help Ugandans explore their country while making Uganda’s attractions more accessible to everyone.

### 2. Goal
We aim to provide a reliable platform that allows users to discover, plan, and book tours efficiently and enjoyably.


## Features
1. Explore Destinations: Browse featured tourist spots on the homepage.
2. Book Tours: Choose from curated tour packages and book them easily.
3. User Accounts: Sign up/log in to manage bookings.
4. Contact Support: Get assistance with any questions or issues.
5. Learn About UgaTours: Understand our mission and how we operate.


## Success Metrics
To ensure UgaTours remains user-friendly and effective, we track the following:

### 1. Number of Bookings
- Every booking is recorded in the database.
- Helps identify popular tours and areas for improvement.

### 2. Booking Time
- A timer starts when a user begins the booking process and stops when completed.
- Helps optimize the booking process for efficiency.

### 3. User Feedback
- After booking, users provide feedback.
- We use this data to enhance our services.


## Implementation of Empirical Investigation (MyBookings.php)
### 1. Empirical Investigation
**Goal**: Evaluate the performance, usability, and maintainability of booking.php.

**Techniques Used:**
- Formal Experiments: Test specific hypotheses about system behavior.
- Surveys: Gather user feedback on the booking interface.

### 2. Hypothesis Testing
- **Hypothesis 1**: "The booking page loads within 2 seconds for 90% of users."
  - **Experiment**: Measure page load time under different conditions (10, 100, 1000 bookings).
  - **Metrics**: Page load time, server response time, database query execution time.
  - **Action**: Optimize database queries and use caching if necessary.

- **Hypothesis 2**: "Users can easily cancel a booking without confusion."
  - **Experiment**: Conduct usability testing with real users.
  - **Metrics**: Success rate of canceling a booking, user satisfaction score.
  - **Action**: Improve button visibility and confirmation messages if needed.

- **Hypothesis 3**: "At least 50% of users use the PDF generation feature."
  - **Experiment**: Track usage of the "Print PDF" button over a month.
  - **Metrics**: Number of PDFs generated, user feedback.
  - **Action**: Remove or improve the feature based on results.

### 3. Data Collection
- Performance Metrics: Page load time, database query execution time, server response time.
- Usability Metrics: Booking cancellation success rate, user satisfaction scores.
- Maintainability Metrics: Code readability (evaluated using PHPMD, PHP_CodeSniffer).

### 4. Control Variables
- Server load (simulate different numbers of concurrent users).
- Database size (test with 100, 1000, and 10,000 bookings).
- User input (use predefined test cases for booking and cancellation).

### 5. Improvements
- **Performance**: Optimize database queries, use caching for frequently accessed data.
- **Usability**: Enhance button visibility, add confirmation dialogs.
- **Maintainability**: Refactor booking.php into smaller components, improve code readability.

### 6. Metrics Summary
| Metric | Target | Action |
|--------|--------|--------|
| Page Load Time | <2 seconds | Optimize queries, use caching |
| Cancel Booking Success Rate | >90% | Improve button visibility, add confirmation dialog |
| Code Readability | High | Add comments, use consistent naming conventions |


## Goals
1. Improve user satisfaction.
2. Reduce booking time.
3. Increase repeat visitors.

### Key Questions
1. What aspects of the website affect satisfaction?
2. What factors contribute to booking time?
3. What features encourage users to return?

### Metrics
1. User Satisfaction Score (from surveys)
2. Average Booking Time (measured in seconds)
3. Repeat Visitors Percentage (tracked via user accounts)

### Investigation Techniques
1. Surveys
2. Formal Experiments
3. Case Studies


## Software Size Metrics
To monitor the growth and efficiency of UgaTours, we use the following metrics:

### 1. Lines of Code (LOC)
- Tracks the number of lines in different files.

### 2. Function Points (FP)
- Measures system functionality beyond raw code.
- Example (MyBookings.php functions):
  - Booking cancellations
  - Displaying booking details
  - Fetching user bookings
  - Storing booking data
- MyBookings.php has **20 Function Points**, showing its workload.

### 3. Reuse Metrics
- Measures the percentage of reused code.
- Example: MyBookings.php reuses db_connection.php and nav.php.
- **Reuse Level: 25%** (50 reused lines out of 200 total).

### Tracking Progress
- **LOC**: To track project growth.
- **FP**: To monitor functionality expansion.
- **Reuse Level**: To maintain efficiency and avoid redundant code.


## Software Cost Metrics

### 1. Empirical Investigation
We conducted hypothesis testing to evaluate performance and usability:

- **Hypothesis 1**: "The booking page loads within 2 seconds for 90% of users."
  - **Experiment**: Measure page load time.
  - **Action**: Optimize queries and implement caching.
  - **File**: MyBookings.php

- **Hypothesis 2**: "Users can easily cancel a booking without confusion."
  - **Experiment**: Conduct usability testing.
  - **Action**: Improve cancel button visibility, add confirmation.
  - **File**: MyBookings.php

### 2. Feedback Collection
- Users submit feedback after booking.
- Feedback is stored in the feedback table.
- We analyze feedback to improve services.
- **File**: feedback.php
  
## Measuring Software Structural Complexity Metrics

To ensure high-quality code and a smooth user experience, we’ve analyzed mybookings.php using the following software metrics:

### **1. Cyclomatic Complexity**
- Measures the complexity of the control flow.
- **Value:** 4 (acceptable).
- **Action:** Refactor if complexity increases.


### **2. Cohesion**
- Measures how closely related the responsibilities of the file are.
- **Value:** Medium (handles multiple related tasks).
- **Action:** Split into smaller files for higher cohesion.

### **3. Coupling**
- Measures the degree of interdependence between modules.
- **Value:** Medium (depends on multiple external files).
- **Action:** Use dependency injection to reduce coupling.

### **4. Information Flow Complexity**
- Measures how data flows through the file.
- **Value:** 16 (low).
- **Action:** Monitor as the file grows.

### **5. Data Structure Complexity**
- Measures the complexity of data structures used.
- **Value:** 22 (acceptable).
- **Action:** Simplify if complexity grows.

## Refactoring Improvements
- **Improved Cohesion:** Split mybookings.php into smaller files ( cancel_booking.php, generate_pdf.php).
- **Reduced Coupling:** Use dependency injection to pass the database connection.
- **Optimized Performance:** Added caching for frequently accessed data.

 ## Usability: Cancellation Success Rate (ISO 9126)
- What: Measures the percentage of successful booking cancellations.
- Why: To ensure users can easily cancel bookings (a critical usability factor).
- Implementation:
Database Table: cancellation_metrics

CREATE TABLE cancellation_metrics (
  id INT AUTO_INCREMENT PRIMARY KEY,
  booking_id INT,
  success BOOLEAN, -- 1 for success, 0 for failure
  error_message VARCHAR(255), -- Error details if cancellation fails
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

- Code Logic:

Every cancellation attempt is logged in cancellation_metrics (success or failure).

Users receive immediate feedback (success/error messages) on MyBookings.php.

## Reliability: Failure Intensity
-What: Tracks the number of errors per cancellation attempt.
-Why: To quantify system reliability and identify recurring issues.

Implementation:
-Data Source: The error_message field in cancellation_metrics.

-Calculation:

Daily failure rate

SELECT 
  DATE(created_at) AS date,
  (COUNT(*) - SUM(success)) AS errors,
  COUNT(*) AS total_attempts
FROM cancellation_metrics
GROUP BY date;


