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
        /// Множество всех категорий RoadMap-ов
        /// </summary>
        private readonly IRMCategory _categoryRMs = new MockRMCategory();
        public IEnumerable<RoadMap> RoadMaps
        {
            get 
            {
                var Test1 = new RoadMap("WebTest") { isFavorite = true, RMCategory = _categoryRMs.AllRMCategories.First() };
                Test1.Children = new List<RoadMap>
                {
                    new RoadMap("WebTest Child1"), new RoadMap("WebTest Child2")
                };

                var Test2 = new RoadMap("DesktopTest") { isFavorite = true, RMCategory = _categoryRMs.AllRMCategories.Skip(1).First() };
                Test2.Children = new List<RoadMap>
                {
                    new RoadMap("DesktopTest Child1")
                };

                var Test3 = new RoadMap("MobileTest") { isFavorite = false, RMCategory = _categoryRMs.AllRMCategories.Last() };
                Test3.Children = new List<RoadMap>
                {
                    new RoadMap("MobileTest Child1"), new RoadMap("MobileTest Child2"), new RoadMap("MobileTest Child3")
                };

                return new List<RoadMap>
                {
                    Test1, Test2, Test3
                };
            }
        }
        public IEnumerable<RoadMap> GetFavRMs { get; set; }

        public RoadMap GetObjectRoadMap(int rmID)
        {
            throw new NotImplementedException();
        }
    }
}
