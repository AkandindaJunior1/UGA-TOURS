# UgaTours - Tourism Website

Welcome to **UgaTours**! This is a website that helps people discover and book amazing tours in Uganda. Whether you're a local or an international visitor, UgaTours makes it easy to explore Uganda's beautiful destinations.

## What’s UgaTours About?

UgaTours is all about making tourism in Uganda simple and fun. We provide:
- Information about tourist spots.
- Curated tour packages for different interests and budgets.
- Easy booking so you can plan your trip without stress.

### Our Mission
We want to help Ugandans explore their own country and make Uganda’s attractions more accessible to everyone.

### Our Goal
To make your travel experience smooth and enjoyable by giving you a reliable platform to discover, plan, and book tours.

## What Can You Do on UgaTours?

- Explore Destinations: Check out featured tourist spots on the home page.
- Book Tours: Choose from curated tour packages and book them easily.
- Sign Up/Log In: Create an account to manage your bookings.
- Contact Us: Reach out if you have questions or need help.
- Learn About Us: Find out more about our mission and goals.

## How We Measure Success

We care about making UgaTours better for you. Here’s how we track our progress:

1. Number of Bookings: We count how many tours are booked to see how popular they are.
2. Booking Time: We measure how long it takes to book a tour to make the process faster.
3. User Feedback: After booking, we ask users how satisfied they are to improve our services.


## How We Implemented These Metrics

To make UgaTours better, we added some features to track and improve the platform:

1. Tracking Bookings
- Every time someone books a tour, we count it in the database.
- This helps us see which tours are popular and which ones need improvement.

2. Measuring Booking Time
- When someone starts booking a tour, we start a timer.
- When they finish booking, we stop the timer and save the time it took.
- This helps us make the booking process faster and smoother.
  
# Implementation of Empirical Investigation based on MyBookings.php file
1. Empirical Investigation
Goal: Evaluate the performance, usability, and maintainability of the booking.php file.

Techniques:

Formal Experiments: Test specific hypotheses about the code's behavior.

Surveys: Collect user feedback on the booking interface.

2. Hypothesis Testing
Hypothesis 1: "The booking page loads within 2 seconds for 90% of users."

Experiment: Measure the page load time under different conditions (e.g., with 10, 100, or 1000 bookings).

Metrics: Page load time, server response time, database query execution time.

Action: Optimize the database query and use caching if the hypothesis is not met.

Hypothesis 2: "Users can easily cancel a booking without confusion."

Experiment: Conduct usability testing with real users.

Metrics: Success rate of canceling a booking, user satisfaction score.

Action: Improve the cancel booking button's visibility and confirmation message if users struggle.

Hypothesis 3: "The PDF generation feature is used by at least 50% of users."

Experiment: Track the usage of the "Print PDF" button over a month.

Metrics: Number of PDFs generated, user feedback.

Action: Remove or improve the feature based on usage data.

3. Data Collection
Performance Metrics:

Page load time.

Database query execution time.

Server response time.

Usability Metrics:

Success rate of canceling a booking.

User satisfaction score (e.g., from surveys).

Maintainability Metrics:

Code readability (e.g., using tools like PHPMD or PHP_CodeSniffer).

4. Control Variables
Ensure that the following variables are controlled during testing:

Server load (e.g., simulate different numbers of concurrent users).

Database size (e.g., test with 100, 1000, and 10,000 bookings).

User input (e.g., use predefined test cases for booking and cancellation).

5. Improvements
Performance Optimization:

Optimize the database query to reduce execution time.

Use caching for frequently accessed data.

Usability Improvements:

Make the "Cancel Booking" button more prominent.

Add a confirmation dialog before canceling a booking.

Maintainability Improvements:

Break down the booking.php file into smaller, reusable components.

Add comments and consistent naming conventions for better readability.

6. Metrics Summary
Metric	Value	Action
Page Load Time	Target: <2 seconds	Optimize database query and use caching.
Cancel Booking Success Rate	Target: >90%	Improve button visibility and confirmation dialog.
Code Readability	Target: High	Add comments and consistent naming conventions.

# Goal			
Improve user satisfaction.

Reduce booking time.		

Increase repeat visitors.		
# Question
What aspects of the website affect satisfaction?

What factors contribute to booking time?

What features encourage users to return?
# Metric
User satisfaction score (survey)

Average time to complete a booking

Percentage of repeat visitors
# Investigation Technique
Survey

Formal Experiment

Case Study
