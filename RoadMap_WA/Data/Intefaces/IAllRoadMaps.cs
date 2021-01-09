using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Intefaces
{
    public interface IAllRoadMaps
    {
        /// <summary>
        /// Выдаёт все RoadMap-ы
        /// </summary>
        IEnumerable<FullRoadMap> RoadMaps { get; }
        /// <summary>
        /// Выдаёт все избранные RoadMap-ы
        /// </summary>
        IEnumerable<RoadMapNode> GetFavRMs { get; set; }
        /// <summary>
        /// Выдаёт RoadMap
        /// </summary>
        FullRoadMap GetObjectRoadMap(string RoadMapName);
    }
}