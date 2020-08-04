<template>

    <div class="w3-sidebar w3-black w3-bar-block" style="width:20%">
        <h3 class="w3-bar-item">MENU</h3><br>


        <a href="/admin/schemeOfStudies" class="w3-bar-item w3-button">Scheme of studies</a>

        <a href="/student/schemeOfStudy/student" class="w3-bar-item w3-button">Student's Scheme of studies</a>
        <a href="/student/PendingCourses" class="w3-bar-item w3-button">Pending Courses</a>
        <a href="/student/PassedCourses" class="w3-bar-item w3-button">Passed Courses</a>
        <a href="/student/RegisteredCourses" class="w3-bar-item w3-button">Registered Courses</a>
        <a href="/student/AddORDropCourses" class="w3-bar-item w3-button">Add/Drop Courses</a>
        <a href="/student/SemesterFreeze" class="w3-bar-item w3-button">Semester Freeze</a>
        <a href="/student/StudentForm/" class="w3-bar-item w3-button">Student's Form</a>
        <a href="/student/Student/SpecialRequest/" class="w3-bar-item w3-button">Make Special Request</a>

        <a href="/batchadvisor/BatchadvisorFormsList/" class="w3-bar-item w3-button">BatchAdvisor's FormsList</a>
        <a href="/batchadvisor/Batchadvisor/SemesterFreeze/" class="w3-bar-item w3-button">BatchAdvisor's Semester Freeze</a>
        <a href="/batchadvisor/SpecialRequest/" class="w3-bar-item w3-button">BatchAdvisor's Special Request</a>


    </div>


</template>

<script>
    export default {
        name: "sidebar",
        props: ['homeRoute'],

    }
</script>

<style>

</style>
