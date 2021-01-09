using RoadMap_WA.Data.Intefaces;
using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Mocks
{
    public class MockRMCategory : IRMCategory
    {
        public List<RMCategory> AllRMCategories
        {
            get
            {
                return new List<RMCategory>
                {
                    new RMCategory { CategoryName = "Custom", Description = "Custom Category", Id = 1 },
                    new RMCategory { CategoryName = "Desktop development", Description = "Coding PC apps (Windows, Linux, MacOS)", Id = 2 },
                    new RMCategory { CategoryName = "Mobile development", Description = "Coding Mobile apps (android, IPhone and etc.)", Id = 3 },
                    new RMCategory { CategoryName = "Web development", Description = "Coding Web-sites and Web-apps", Id = 4 }
                };
            }
        }
    }
}