using RoadMap_WA.Data.Intefaces;
using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Mocks
{
    public class MockRoadMaps : IAllRoadMaps
    {
        /// <summary>
        /// All RoadMap categories
        /// </summary>
        private readonly IRMCategory _categoryRMs = new MockRMCategory();
        public IEnumerable<FullRoadMap> RoadMaps
        {
            get 
            {
                var Test1 = new FullRoadMap("Back-end .NET", 1, _categoryRMs.AllRMCategories[0]);
                Test1.AddNode(new RoadMapNode(1, 0, "begin", "Back-end", "All, what user doesn't see xD"));
                Test1.AddNode(new RoadMapNode(2, 1, "mid", "Package Manager", "Package managers for C#"));
                Test1.AddNode(new RoadMapNode(3, 1, "mid", "Desktop App", "Apps for desktop"));
                Test1.AddNode(new RoadMapNode(4, 2, "end", "NUget", "Special Package Manager for .NET"));
                Test1.AddNode(new RoadMapNode(5, 3, "end", "Windows.Forms", "Windows.Forms ne ojiadaly"));
                Test1.AddNode(new RoadMapNode(6, 3, "end", "Graphics", "All graphics in .NET for desktop"));

                var Test2 = new FullRoadMap("Windows.Forms", 2, _categoryRMs.AllRMCategories[1]);
                Test2.AddNode(new RoadMapNode(2, 1, "mid", "Graphics", "All graphics in .NET for desktop"));
                Test2.AddNode(new RoadMapNode(3, 2, "mid", "GraphWPF", "Special library for drawing"));
                Test2.AddNode(new RoadMapNode(4, 3, "end", "Windows.Forms Apps", "Apps, which are built using .NET"));
                Test2.IsPopular = true;
                Test2.ShortDesc = "Windows Forms is a UI framework for building Windows desktop apps.";
                Test2.LongDesc = "Windows Forms is a UI framework for building Windows desktop apps." +
                    "It provides one of the most productive ways to create desktop apps based on the visual designer provided in Visual Studio." +
                    "Functionality such as drag-and-drop placement of visual controls makes it easy to build desktop apps.With Windows Forms," +
                    "you develop graphically rich apps that are easy to deploy, update, and work while offline or while connected to the internet.Windows" +
                    "Forms apps can access the local hardware and file system of the computer where the app is running.";

                var Test3 = new FullRoadMap("Xamarin", 3, _categoryRMs.AllRMCategories[2]);

                var Test4 = new FullRoadMap("ASP.NET", 4, _categoryRMs.AllRMCategories[3]);
                Test4.IsPopular = true;
                Test4.ShortDesc = "Free. Cross-platform. Open source. A framework for building web apps and services with.NET and C#.";
                Test4.LongDesc = "ASP.NET is an open-source, server-side web-application framework designed for web development to produce dynamic web pages. " +
                    "It was developed by Microsoft to allow programmers to build dynamic web sites, applications and services.It was first released in January" +
                    " 2002 with version 1.0 of the .NET Framework and is the successor to Microsoft's Active Server Pages (ASP) technology. " +
                    "ASP.NET is built on the Common Language Runtime (CLR), allowing programmers to write ASP.NET code using any supported .NET language. " +
                    "The ASP.NET SOAP extension framework allows ASP.NET components to process SOAP messages. ASP.NET's successor is ASP.NET Core. " +
                    "It is a re-implementation of ASP.NET as a modular web framework, together with other frameworks like Entity Framework. The new " +
                    "framework uses the new open-source .NET Compiler Platform (codename Roslyn) and is cross platform. " +
                    "ASP.NET MVC, ASP.NET Web API, and ASP.NET Web Pages (a platform using only Razor pages) have merged into a unified MVC 6.";

                return new List<FullRoadMap>
                {
                    Test1, Test2, Test3, Test4
                };
            }
        }
        public IEnumerable<RoadMapNode> GetFavRMs { get; set; }

        public FullRoadMap GetObjectRoadMap(string RoadMapName)
        {
            throw new NotImplementedException();
        }
    }
}
