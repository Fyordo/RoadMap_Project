<?php
include_once 'models/FullRoadMap.php';
include_once 'models/RoadMapNode.php';
include_once 'models/Category.php';
class AllRoadMaps
{
    public static function GetAllRoadMaps()
    {
        $AllRoadMaps = [];
        $Test1 = new FullRoadMap(1, "Back-end .NET", 1, [], false, "C# Backend", "Veeeery long C# BackEnd");
        $Test1->AddNode(new RoadMapNode(1, 0, "begin", 1, "Back-end", "All, what user doesn't see xD"));
        $Test1->AddNode(new RoadMapNode(2, 1, "mid", 1, "Package Manager", "Package managers for C#"));
        $Test1->AddNode(new RoadMapNode(3, 1, "mid", 1, "Desktop App", "Apps for desktop"));
        $Test1->AddNode(new RoadMapNode(4, 2, "end", 1, "NUget", "Special Package Manager for .NET"));
        $Test1->AddNode(new RoadMapNode(5, 3, "end", 1, "Windows.Forms", "Windows.Forms ne ojiadaly"));
        $Test1->AddNode(new RoadMapNode(6, 3, "end", 1, "Graphics", "All graphics in .NET for desktop"));

        $Test2 = new FullRoadMap(2, "Windows.Forms", 2, [], true, "", "");
        $Test2->AddNode(new RoadMapNode(2, 1, "mid", 2, "Graphics", "All graphics in .NET for desktop"));
        $Test2->AddNode(new RoadMapNode(3, 2, "mid", 2, "GraphWPF", "Special library for drawing"));
        $Test2->AddNode(new RoadMapNode(4, 3, "end", 2, "Windows.Forms Apps", "Apps, which are built using .NET"));
        $Test2->IsPopular = true;
        $Test2->ShortDesc = "Windows Forms is a UI framework for building Windows desktop apps.";
        $Test2->LongDesc = "Windows Forms is a UI framework for building Windows desktop apps." .
            "It provides one of the most productive ways to create desktop apps based on the visual designer provided in Visual Studio." .
            "Functionality such as drag-and-drop placement of visual controls makes it easy to build desktop apps.With Windows Forms," .
            "you develop graphically rich apps that are easy to deploy, update, and work while offline or while connected to the internet.Windows" .
            "Forms apps can access the local hardware and file system of the computer where the app is running.";

        $Test3 = new FullRoadMap(3, "Xamarin", 3, [], false, "", "");

        $Test4 = new FullRoadMap(4, "ASP.NET", 4, [], true, "", "");
        $Test4->IsPopular = true;
        $Test4->ShortDesc = "Free. Cross-platform. Open source. A framework for building web apps and services with.NET and C#.";
        $Test4->LongDesc = "ASP.NET is an open-source, server-side web-application framework designed for web development to produce dynamic web pages. " .
            "It was developed by Microsoft to allow programmers to build dynamic web sites, applications and services.It was first released in January" .
            " 2002 with version 1.0 of the .NET Framework and is the successor to Microsoft's Active Server Pages (ASP) technology. " .
            "ASP.NET is built on the Common Language Runtime (CLR), allowing programmers to write ASP.NET code using any supported .NET language. " .
            "The ASP.NET SOAP extension framework allows ASP.NET components to process SOAP messages. ASP.NET's successor is ASP.NET Core. " .
            "It is a re-implementation of ASP.NET as a modular web framework, together with other frameworks like Entity Framework. The new " .
            "framework uses the new open-source .NET Compiler Platform (codename Roslyn) and is cross platform. " .
            "ASP.NET MVC, ASP.NET Web API, and ASP.NET Web Pages (a platform using only Razor pages) have merged into a unified MVC 6.";

        array_push($AllRoadMaps, $Test1, $Test2, $Test3, $Test4);
        return $AllRoadMaps;
    }
}
